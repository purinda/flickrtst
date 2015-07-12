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
        if (isset($_SERVER['REQUEST_URI'])) {
            $path = $_SERVER['REQUEST_URI'];
        } else {
            $path = self::BASEPATH;
        }

        if (isset($this->_routes[$path])) {
            return $this->_routes[$path];
        } else {
            throw new NotFoundHttpException();
        }
    }
}
