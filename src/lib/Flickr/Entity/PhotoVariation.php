<?php

namespace Flickr\Entity;

class PhotoVariation
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
     * Instantiate PhotoVariation object.
     * Accepts size label as an argument.
     *
     * @param string $label
     */
    public function __construct($label)
    {
        $this->_label = $label;
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

    /**
     * Sets the Flickr URL for the photo size.
     *
     * @param string $_url the url
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->_url = $url;

        return $this;
    }

    /**
     * Sets the Flickr photo size label node attribute value.
     *
     * @param string $_label the label
     *
     * @return self
     */
    public function setLabel($label)
    {
        $this->_label = $label;

        return $this;
    }

    /**
     * Sets the Width of the photo variation in pixels.
     *
     * @param int $_width the width
     *
     * @return self
     */
    public function setWidth($width)
    {
        $this->_width = $width;

        return $this;
    }

    /**
     * Sets the Height of the photo variation in pixels.
     *
     * @param int $_height the height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->_height = $height;

        return $this;
    }

    /**
     * Sets the Direct URL for the photo size.
     *
     * @param string $_source the source
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->_source = $source;

        return $this;
    }
}
