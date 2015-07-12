<?php

namespace FlickrTestApp\Controller;

use Framework\AbstractController;
use Framework\Response;

class HomeController extends AbstractController
{
    public function indexAction()
    {
        return $this->render(__DIR__ . '/../Views/home.php.tpl', ['test' => 'Hello']);
    }

}
