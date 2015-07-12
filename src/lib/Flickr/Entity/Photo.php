<?php

namespace Flickr\Entity;

class Photo
{

    protected $_photo_id;

    protected $_title;

    /**
     * Store individual size variations of the Photo object.
     * @var array
     */
    protected $_variations = [];

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
     * @param  int $_photo_id the photo id
     * @return Photo
     */
    public function setPhotoId($photo_id)
    {
        $this->_photo_id = $photo_id;

        return $this;
    }

    /**
     * Gets the photo title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Set title of the photo.
     *
     * @param  string $title
     * @return Photo
     */
    public function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    /**
     * Get all size variations of the Photo object.
     *
     * @return array
     */
    public function getVariations()
    {
        return $this->_variations;
    }

    /**
     * Set size variation of the Photo object.
     *
     * @param array $variations
     *
     * @return self
     */
    public function setVariations(array $variations)
    {
        $this->_variations = $variations;
        return $this;
    }

    /**
     * Add a PhotoVariation keyed with the variation label.
     *
     * @param PhotoVariation $variation
     * @return Photo
     */
    public function addVariation(PhotoVariation $variation)
    {
        if (!isset($this->_variations[$variation->getLabel()])) {
            $this->_variations[$variation->getLabel()] = $variation;
        }

        return $this;
    }

    /**
     * Checks if variation exists.
     *
     * @param string $label
     * @return boolean
     */
    public function hasVariation($label)
    {
        foreach ($this->_variations as $_label => $variation) {
            if ($_label == $label) {
                return true;
            }
        }

        return false;
    }
}
