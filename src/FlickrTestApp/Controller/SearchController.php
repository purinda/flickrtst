<?php

namespace FlickrTestApp\Controller;

use Framework\AbstractController;

class SearchController extends AbstractController
{
    public function searchAction($args)
    {

        return $this->render(__DIR__ . '/../Views/home.php.tpl', ['test' => 'Hellssso']);
    }

}
