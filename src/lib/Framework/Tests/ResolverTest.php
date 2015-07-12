<?php

namespace Framework\Tests;

use Framework\Router;
use Framework\Request;
use Framework\Resolver;
use Framework\Response;
use Framework\Exception\InvalidHttpMethodException;

class ResolverTest extends \PHPUnit_Framework_TestCase
{
    public $routes = [
        '/' => [
            'Framework\\Tests\\ResolverTest' => 'indexTest'
        ],
        '/someroute/' => [
            'Framework\\Tests\\ResolverTest' => 'shouldBeResolved'
        ],
        '/base/' => [
            'Framework\\Tests\\ResolverTest' => 'baseTest'
        ],
    ];

    public function setup()
    {
        $this->router = new Router($this->routes);
        $this->resolver = Resolver::build($this->router);
    }

    public function testResolve()
    {
        $request = new Request('/someroute/', 'GET', []);
        $response = $this->resolver->handle($request);

        $this->assertEquals($response->getContent(), 'Hello World!');
    }

    /**
     * @expectedException Framework\Exception\InvalidHttpMethodException
     */
    public function testInvalidMethodException()
    {
        $request = new Request('/someroute/', 'PUT', []);
    }

    /**
     * This function will be resolved from the above test
     */
    public function shouldBeResolvedAction()
    {
        $response = new Response();
        $response->setContent('Hello World!');
        return $response;
    }
}
