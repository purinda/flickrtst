<?php

namespace Flickr\Entity;

class Photo
{

    protected $_photo_id;

    public function __construct($photo_id)
    {
        $this->_photo_id = $photo_id;
    }

    /**
     * Gets the flickr photo id
     *
     * @return int
     */
    public function getPhotoId()
    {
        return $this->_photo_id;
    }

    /**
     * Sets the flickr photo id
     *
     * @param mixed $_photo_id the photo id
     *
     * @return Photo
     */
    public function setPhotoId($photo_id)
    {
        $this->_photo_id = $photo_id;

        return $this;
    }
}
