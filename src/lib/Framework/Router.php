<?php

namespace Framework;

class Router {

    protected $_basepath    = '/';
    protected $_routes      = [];

    /**
     * Add custom route with the callback to be run.
     *
     * @param  string   $route_name
     * @param  callable $callback
     * @return Router
     */
    public function map($route_name, callable $callback)
    {
        $this->_routes[$route_name] = $callback;
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
            $p = $_SERVER['REQUEST_URI'];
        } else {
            $p = self::BASEPATH;
        }

        $this->_routes[$p]();
    }
}
