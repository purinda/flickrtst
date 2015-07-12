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

    /**
     * Call Flickr API endpoint using the parameters and method.
     *
     * @param  string $method
     * @param  array  $params
     * @return string
     */
    protected function callApi($method, array $params)
    {
        $get_url = self::ENDPOINT . "?method=$method";
        $encoded_url_params = http_build_query(array_map('urlencode', $params));

        $json_response = file_get_contents($get_url . '&' . $encoded_url_params);
        return $json_response;
    }

}
