<?php

namespace Framework;

abstract class AbstractController
{

    /**
     * Current request object
     *
     * @var Request
     */
    protected $request;

    protected function __construct()
    {

    }

    /**
     * Generate response content output using the passed in template
     * and data.
     *
     * @param  string   $template
     * @param  array    $data
     * @return Response
     */
    protected function render($template, array $data = [])
    {

    }

}

