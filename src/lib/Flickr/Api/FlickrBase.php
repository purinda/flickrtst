<?php

namespace Flickr\Api;

abstract class FlickrBase
{

    /**
     * Your API application key.
     * @var string
     */
    protected $_api_key = null;

    /**
     * Gets the API application key.
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->_api_key;
    }

    /**
     * Sets the API application key.
     *
     * @param string $_api_key the api key
     *
     * @return self
     */
    public function setApiKey($api_key)
    {
        $this->_api_key = $api_key;

        return $this;
    }

}
