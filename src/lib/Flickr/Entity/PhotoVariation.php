<?php

namespace Flickr\Entity;

class PhotoVariation extends Photo
{

    /**
     * Flickr photo size label node attribute value
     * @var string
     */
    protected $_label;

    /**
     * Width of the photo variation in pixels
     * @var int
     */
    protected $_width;

    /**
     * Height of the photo variation in pixels
     * @var int
     */
    protected $_height;

    /**
     * Direct URL for the photo size
     * @var string
     */
    protected $_source;

    /**
     * Flickr URL for the photo size
     * @var string
     */
    protected $_url;

    /**
     * Instantiate PhotoVariation object
     *
     * @param int $photo_id Flickr photo id
     */
    public function __construct($photo_id)
    {
        parent::__construct($photo_id);
    }

    /**
     * Gets the Flickr photo size label node attribute value.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * Gets the Width of the photo variation in pixels.
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * Gets the Height of the photo variation in pixels.
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * Gets the Direct URL for the photo size.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->_source;
    }

    /**
     * Gets the Flickr URL for the photo size.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }
}
