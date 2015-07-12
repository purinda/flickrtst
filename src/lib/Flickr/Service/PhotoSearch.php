<?php

namespace Flickr\Service;

use Flickr\Api\Photos;
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
    const PER_PAGE   = 5;

    public static function search($query)
    {

    }

}
