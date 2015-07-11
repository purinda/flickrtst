<?php

namespace Framework;

class Response
{
    protected $_content;

    public function dispatch()
    {
        // Check if headers have been sent
        if (headers_sent()) {
            return $this;
        }

        echo $this->_content;

        return $this;
    }

    /**
     * Sets the HTTP response body
     *
     * @param string $content
     *
     * @return Response
     */
    public function setContent($content)
    {
        $this->_content = $content;

        return $this;
    }
}
