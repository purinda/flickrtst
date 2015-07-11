<?php

namespace Framework;

class Resolver
{
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
     * @return Response
     */
    public function handle(Request $request)
    {

        return new Response();
    }
}
