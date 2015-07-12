<?php

namespace Framework\Tests;

use Framework\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    public $routes = [
        '/' => [
            'Framework\\Tests\\RouterTest' => 'indexTest'
        ],
        '/someroute/' => [
            'Framework\\Tests\\RouterTest' => 'someTest'
        ],
        '/base/' => [
            'Framework\\Tests\\RouterTest' => 'baseTest'
        ],
    ];

    public function setup()
    {
        $this->router = new Router($this->routes);
    }

    public function testRoutes()
    {
        // Try home route
        $result = $this->router->match('/');
        $this->assertEquals($result['route'], $this->routes['/']);

        // Try search route
        $result = $this->router->match('/someroute/');
        $this->assertEquals($result['route'], $this->routes['/someroute/']);
    }

    public function testBasePath()
    {
        // Try setting custom basepath
        $this->router->setBasePath('/base/');

        $result = $this->router->match('/base/');

        $this->assertEquals($result['route'], $this->routes['/base/']);
        $this->assertEquals($result['params'], null);
    }
}
