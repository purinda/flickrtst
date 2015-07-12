<?php

namespace Flickr\Api;

class Photos extends FlickrBase
{
    /**
     * default number of results per page
     */
    const DEFAULT_PER_PAGE = 5;

    /**
     * Following constants indicate supported media types for
     * flickr.photos.search endpoint.
     */
    const MEDIATYPE_ALL = 'all';
    const MEDIATYPE_ALL = 'photos';
    const MEDIATYPE_ALL = 'videos';

    /**
     * Instantiate a Flickr.Photos service object.
     * API key can be passed in as a parameter or later called using
     * setApiKey().
     *
     * @param string $api_key
     */
    public function __construct($api_key = null)
    {
        $this->setApiKey($api_key);
    }

    /**
     * Return a list of photos matching some criteria. Only photos visible to the calling user (or API)
     * will be returned because of authentication restrictions.
     *
     * @param  string  $text
     * @param  string  $media_type
     * @param  integer $per_page
     * @param  integer $page
     * @return
     */
    public function search($text, $media_type = self::MEDIATYPE_ALL, $per_page = self::DEFAULT_PER_PAGE, $page = 1)
    {

    }

    /**
     * Return available sizes of the photo requested.
     *
     * @param  string $photo_id
     * @return array
     */
    public function getSizes($photo_id)
    {

    }

}
