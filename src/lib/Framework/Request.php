<?php

namespace Framework;

use Framework\Exception\InvalidHttpMethodException;

class Request
{

    // Supported HTTP methods
    const METHOD_GET  = 'GET';
    const METHOD_POST = 'POST';

    protected $_parameters = [];
    protected $_uri        = '';
    protected $_method     = '';
    protected $_content    = '';

    public function __construct($uri, $method = METHOD_GET, array $parameters = [])
    {
        $this->_uri = $uri;

        // Allow only supported HTTP methods
        switch ($method) {
            case self::METHOD_GET:
            case self::METHOD_POST:
                $this->_method = $method;
                break;
            default:
                throw new InvalidHttpMethodException();
        }

        $this->_parameters = $parameters;
    }

    /**
     * Instantiate a Request object based on the current request coming from the
     * client.
     *
     * @return Request
     */
    public static function fromCurrent()
    {
        $request = new static('', self::METHOD_GET, []);
        return $request;
    }

    /**
     * Gets get all request parameters.
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->_parameters;
    }

    /**
     * Get a requet parameter if exists.
     *
     * @param  string $parameter_name
     * @return mixed
     */
    public function getParameter($parameter_name)
    {
        return isset($this->_parameters[$parameter_name]) ?: false;
    }

    /**
     * Set request parameters.
     *
     * @param array $parameters
     *
     * @return Request
     */
    public function setParameters(array $parameters = [])
    {
        $this->_parameters = $parameters;

        return $this;
    }

    /**
     * Gets the request URI.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->_uri;
    }

    /**
     * Sets the request URI.
     *
     * @param mixed $_uri the uri
     *
     * @return Request
     */
    public function setUri($uri)
    {
        $this->_uri = $uri;

        return $this;
    }

    /**
     * Gets the HTTP request method.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * Sets the HTTP request _method.
     *
     * @param string $_method
     *
     * @return Request
     */
    public function setMethod($method)
    {
        $this->_method = $method;

        return $this;
    }

    /**
     * Gets the HTTP request content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * Sets the HTTP request content.
     *
     * @param string $content
     *
     * @return Request
     */
    public function setContent($content)
    {
        $this->_content = $content;

        return $this;
    }
}