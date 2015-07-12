<?php

namespace Flickr\Api;

abstract class FlickrBase
{
    /**
     * Flickr API endpoint
     */
    const ENDPOINT = 'https://api.flickr.com/services/rest/';

    /**
     * API request format used
     */
    const REQUEST_FORMAT = 'json';

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
