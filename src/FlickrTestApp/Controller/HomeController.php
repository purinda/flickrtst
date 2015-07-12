<?php

namespace FlickrTestApp\Controller;

use FlickrTestApp\Config\AppConfig;
use Framework\AbstractController;

class HomeController extends AbstractController
{
    public function indexAction()
    {
        return $this->render(
            __DIR__ . '/../Views/home.php.tpl',
            [
                'title' => 'Flickr Test - Home'
            ]
        );
    }

}
