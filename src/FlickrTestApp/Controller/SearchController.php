<?php

namespace FlickrTestApp\Controller;

use Framework\AbstractController;
use FlickrTestApp\Config\AppConfig;
use Flickr\Api\FlickrPhotos;
use Flickr\Service\PhotoSearch;

class SearchController extends AbstractController
{

    /**
     * Responsible for handling search queries
     * @return Framework\Response
     */
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

        // Build Prev|Next links.
        //
        // * I would move this to a service/helper but to keep this app simple I have implemented
        //   two functions within the controller
        $prev = self::buildPrevLink($page, $query);
        $next = self::buildNextLink($photos['total_pages'], $page, $query);

        return $this->render(
            __DIR__ . '/../Views/results.php.tpl',
            [
                'query'  => $query,
                'photos' => $photos['items'],
                'prev'   => $prev,
                'next'   => $next,
            ]
        );
    }

    /**
     * Buld "Next" page link used in the pagination bar
     *
     * @param  int    $total
     * @param  int    $page
     * @param  string $query
     * @return string
     */
    public static function buildNextLink($total, $page, $query)
    {
        return '/search/?' . http_build_query(
            [
                'query' => $query,
                'page'  => ($total == $page) ?: (int) $page + 1,
            ]
        );
    }

    /**
     * Buld "Prev" page link used in the pagination bar
     *
     * @param  int    $page
     * @param  string $query
     * @return string
     */
    public static function buildPrevLink($page, $query)
    {
        return '/search/?' . http_build_query(
            [
                'query' => $query,
                'page'  => ($page == 1) ?: (int) $page - 1,
            ]
        );
    }
}
