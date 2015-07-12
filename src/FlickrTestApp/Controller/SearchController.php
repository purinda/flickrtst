<?php

namespace FlickrTestApp\Controller;

use Framework\AbstractController;
use FlickrTestApp\Config\AppConfig;
use Flickr\Api\FlickrPhotos;
use Flickr\Service\PhotoSearch;

class SearchController extends AbstractController
{
    public function searchAction()
    {

        $query = $this->request->getParameter('query');
        $page  = $this->request->getParameter('page');

        $flickr_photos = new FlickrPhotos(AppConfig::FLICKR_API_KEY);
        $photo_search = new PhotoSearch($flickr_photos);

        if ((int) $page <= 0) {
            $page = 1;
        }

        $photos = $photo_search->search($query, (int) $page);

        return $this->render(
            __DIR__ . '/../Views/results.php.tpl',
            [
                'query'  => $query,
                'photos' => $photos['items'],
                'page'   => $photos['page'],
                'pages'  => $photos['total_pages'],
            ]
        );
    }

}
