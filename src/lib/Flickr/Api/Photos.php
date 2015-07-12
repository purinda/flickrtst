<?php

namespace Flickr\Api;

use Flickr\Exception\InvalidMediaTypeException;

class Photos extends FlickrBase
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
     * @return array
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
            'api_key'  => $this->getApiKey(),
            'text'     => $text,
            'media'    => $media_type,
            'per_page' => $per_page,
            'page'     => $page,
            'format'   => parent::REQUEST_FORMAT,
        ];

        $get_url            = self::ENDPOINT . '?method=flickr.photos.search';
        $encoded_url_params = http_build_query(array_map('urlencode', $params));

        $json_response = file_get_contents($get_url . '&' . $encoded_url_params);

        return $json_response;
    }

    /**
     * Return available sizes of the photo requested.
     *
     * @param  string $photo_id
     * @return array
     */
    public function getSizes($photo_id)
    {
        // https://api.flickr.com/services/rest/?method=flickr.photos.getSizes&api_key=45abdd3eaa75675f388576c42d826332&photo_id=19440297828
    }

}
