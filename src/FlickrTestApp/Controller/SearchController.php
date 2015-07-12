<?php

namespace FlickrTestApp\Controller;

use Framework\AbstractController;

class SearchController extends AbstractController
{
    public function searchAction()
    {

        $query = $this->request->getParameter('query');
        $page  = $this->request->getParameter('page');


        return $this->render(
            __DIR__ . '/../Views/results.php.tpl',
            [
                'title' => 'Flickr Test - ' . $query
            ]
        );
    }

}
