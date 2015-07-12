<?php

namespace Framework;

class Resolver
{
    const CONTROLLER_METHOD_SUFIX = 'Action';

    protected $_router = null;

    /**
     * Instantiate a Resolver based on the router configuration
     *
     * @param Router $router
     */
    protected function __construct(Router $router)
    {
        $this->_router = $router;
    }

    /**
     * Build an instance of the Resolver for serving the request against
     * the Router instance passed in.
     *
     * @param  Router $router
     * @return Resolver
     */
    public static function build(Router $router)
    {
        return new static($router);
    }

    /**
     * Handle the incoming HTTP request and return a
     * Response object.
     *
     * @param  Request  $request
     * @throws InvalidHttpResponse
     * @return Response
     */
    public function handle(Request $request)
    {
        $route = $this->_router->match();

        $func       = reset($route) . self::CONTROLLER_METHOD_SUFIX;
        $class_name = key($route);
        $controller = new $class_name($request);

        $response = call_user_func_array(
            [
                $controller,
                $func,
            ],
            []
        );

        if ($response instanceof Response) {
            return $response;
        } else {
            throw new InvalidHttpResponse();
        }
    }
}
