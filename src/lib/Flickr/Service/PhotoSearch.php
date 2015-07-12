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
     * search criteria. PhotoVariation object contains size variations and
     * URLs to the image variations.
     *
     * @param  string  $query
     * @param  integer $page
     * @param  int     $page_size
     * @return array
     */
    public function search($query, $page = 1, $page_size = self::PER_PAGE)
    {
        $json    = $this->_photos->search($query, FlickrPhotos::MEDIATYPE_PHOTOS, $page_size, $page);
        $results = json_decode($json)->photos;

        // Return null if no search results found
        if ($results->total <= 0) {
            return null;
        }

        $photos = [
            'items'       => [],
            'total_pages' => $results->total,
            'page'        => $page,
        ];

        foreach ($results->photo as $raw_photo) {
            $variations = json_decode($this->_photos->getSizes($raw_photo->id))->sizes;

            $photo = new Photo($raw_photo->id);
            $photo->setTitle($raw_photo->title);

            foreach ($variations->size as $variation) {
                $photo_variation = new PhotoVariation($variation->label);
                $photo_variation
                    ->setWidth($variation->width)
                    ->setHeight($variation->height)
                    ->setSource($variation->source)
                    ->setUrl($variation->url)
                ;

                $photo->addVariation($photo_variation);
            }

            $photos['items'][] = $photo;
        }

        return $photos;
    }

}
