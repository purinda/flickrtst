<?php

namespace FlickrTestApp\Controller;

use FlickrTestApp\Config\AppConfig;
use Framework\AbstractController;
use Flickr\Api\Photos;

class HomeController extends AbstractController
{
    public function indexAction()
    {
        $photos = new Photos(AppConfig::FLICKR_API_KEY);

        return $this->render(
            __DIR__ . '/../Views/home.php.tpl',
            [
                'title' => 'Flickr Test - Home'
            ]
        );
    }

}
