<?php

namespace FlickrTestApp\Config;

class AppConfig
{
    const FLICKR_API_KEY = '45abdd3eaa75675f388576c42d826332';
    const FLICKR_SECRET  = 'db6fa4d32ff36e35';

    public static $routes = [
        '/' => [
            'FlickrTestApp\\Controller\\HomeController' => 'index'
        ],
        '/search/' => [
            'FlickrTestApp\\Controller\\SearchController' => 'search'
        ],
    ];

}
