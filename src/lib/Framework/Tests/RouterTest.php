<?php

namespace Framework\Tests;

use Framework\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    public $routes = [
        '/' => [
            'Framework\\Tests\\RouterTest' => 'indexTest'
        ],
        '/search/' => [
            'Framework\\Tests\\RouterTest' => 'searchTest'
        ],
    ];

    public function setup()
    {
        $this->router = new Router($this->routes);
    }

    public function testRoutes()
    {

        $this->assertEquals(1, 1);
    }

}
