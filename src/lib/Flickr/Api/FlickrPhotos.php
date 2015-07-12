<?php

namespace Flickr\Api;

use Flickr\Exception\InvalidMediaTypeException;

class FlickrPhotos extends FlickrBase
{

    /**
     * Following constants indicate supported media types for
     * flickr.photos.search endpoint.
     */
    const MEDIATYPE_ALL    = 'all';
    const MEDIATYPE_PHOTOS = 'photos';
    const MEDIATYPE_VIDEOS = 'videos';

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
     * @return string
     */
    public function search($text, $media_type, $per_page, $page)
    {
        if (!in_array(
            strtolower($media_type),
            [
                self::MEDIATYPE_ALL,
                self::MEDIATYPE_PHOTOS,
                self::MEDIATYPE_VIDEOS
            ])
        ) {
            throw new InvalidMediaTypeException();
        }

        $params = [
            'api_key'        => $this->getApiKey(),
            'text'           => $text,
            'media'          => $media_type,
            'per_page'       => $per_page,
            'page'           => $page,
            'nojsoncallback' => 1,
            'format'         => parent::REQUEST_FORMAT,
        ];

        return $this->callApi('flickr.photos.search', $params);
    }

    /**
     * Return available sizes of the photo requested.
     *
     * @param  int   $photo_id
     * @return string
     */
    public function getSizes($photo_id)
    {
        $params = [
            'api_key'        => $this->getApiKey(),
            'photo_id'       => $photo_id,
            'format'         => parent::REQUEST_FORMAT,
            'nojsoncallback' => 1,
        ];

        return $this->callApi('flickr.photos.getInfo', $params);
    }

}
