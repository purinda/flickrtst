<?php

namespace Framework;

class Router
{
    protected $_basepath    = '/';
    protected $_routes      = [];

    /**
     * Build an instance of the Router with supplied routes
     *
     * @param array $routes
     */
    public function __construct(array $routes = [])
    {
        foreach ($routes as $route_name => $controller_action) {
            $this->map($route_name, $controller_action);
        }
    }

    /**
     * Add custom route with the controller action to be run.
     *
     * @param  string $route_name
     * @param  array  $controller_action
     * @return Router
     */
    public function map($route_name, $controller_action)
    {
        $this->_routes[$route_name] = $controller_action;
        return $this;
    }

    /**
     * Set routing base path.
     *
     * @param string $path
     * @return Router
     */
    public function setBasePath($path)
    {
        $this->_basepath = $path;
        return $this;
    }

    /**
     * Match current request URL within the named routes stored.
     *
     * @return array|null return an array with matched route details or NULL on failure.
     */
    public function match()
    {
        $placeholder_regex = '/({[a-z0-9]+})\/?/';
        $uri = $_SERVER['REQUEST_URI'];

        // Special case for base path
        if ($uri == $this->_basepath) {
            return [
                'route'  => $this->_routes[$uri],
                'params' => null,
            ];
        }

        // Match placeholders
        foreach ($this->_routes as $route => $controller_action) {
            $matched = false;

            // Ignore matching basepath
            if ($route == $this->_basepath) {
                continue;
            }

            // Routes with placeholders
            if (preg_match_all($placeholder_regex, $route, $matches)) {
                $placeholders = $matches[1];

                // Build a regex for matching URI params
                foreach ($placeholders as &$placeholder) {
                    $route = str_replace($placeholder, '(.*)', $route);
                }

                // ending / in an URI is ignored for the sake of simplicity of this router
                // by adding an extra / at the end if it exists within the URI itself.
                if ('/' == substr($uri, -1)) {
                    $route .= '/';
                }

                // Fix ending delimeter for preg_match
                $route = '/' . addcslashes(substr($route, 1), '/') . '/';

                // Route matched
                if (preg_match($route, $uri, $params)) {
                    unset($params[0]);

                    if (count($params) == count($placeholders)) {
                        $matched = true;
                    }
                }

                if (true === $matched) {
                    return [
                        'route'  => $controller_action,
                        'params' => array_combine(
                            // Replace placeholders within route config
                            preg_replace('/{|}/', '', $placeholders),
                            $params
                        ),
                    ];
                }
            } else {

                // static routes
                if (isset($this->_routes[$uri])) {
                    return [
                        'route' => $this->_routes[$uri],
                        'params' => null,
                    ];
                }
            }
        }

        // None matched
        throw new NotFoundHttpException();
    }

}
