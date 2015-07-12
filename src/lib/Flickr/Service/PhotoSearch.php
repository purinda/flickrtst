<?php

namespace Flickr\Service;

use Flickr\Api\FlickrPhotos;
use Flickr\Entity\Photo;
use Flickr\Entity\PhotoVariation;

class PhotoSearch
{
    /**
     * PhotoSearch class is only responsible for searching media type Photo
     * in Flickr.
     */
    const MEDIA_TYPE = 'photo';

    /**
     * default number of results per page
     */
    const PER_PAGE = 5;

    protected $_photos;

    /**
     * Instantiate a PhotoSearch service using the FlickrPhotos class which
     * implements flickr.photos.* functionality.
     *
     * @param FlickrPhotos $photos
     */
    public function __construct(FlickrPhotos $photos)
    {
        $this->_photos = $photos;
    }

    /**
     * Return an array of PhotoVariation objects matching the
     * search criteria.
     *
     * @param  string  $query
     * @param  int     $page_size
     * @param  integer $page
     * @return array
     */
    public function search($query, $page_size = self::PER_PAGE, $page = 1)
    {
        $json = $this->_photos->search($query, FlickrPhotos::MEDIATYPE_PHOTOS, $page_size, $page);
        return $json;
    }

}
