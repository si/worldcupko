<?php

/**
 * Class to build RSS flux
 * @author Cyril Perrin
 * @license LGPL v3
 * @version 2013-10-14
 */
class CyrilPerrinRss
{
    /** @var \DOMDocument document */
    private $_document;
    
    /** @var \DOMElement channel */
    private $_channel;

    /**
     * Constructor
     * @param $title string channel title
     * @param $link string channel link
     * @param $description string channel description
     * @param $category string channel category
     * @param $language string language used
     * @param $refresh int caching in minutes
     * @param $build int channel build timestamp
     */
    public function __construct($title,$link,$description,$category=null,
        $language=null,$refresh=null,$build=null)
    {
        // Create document
        $this->_document = new \DOMDocument('1.0', 'utf-8');
        
        // Create root
        $root = $this->_document->createElement('rss');
        $root->setAttribute('version', '2.0');
        $this->_document->appendChild($root);
        
        // Create channel
        $this->_channel = $this->_document->createElement('channel');
        $this->appendChild($this->_channel, 'title', $title);
        $this->appendChild($this->_channel, 'link', $link);
        $this->appendChild($this->_channel, 'description', $title);
        if ($category !== null) {
            $this->appendChild($this->_channel, 'category', $category);
        }
        if ($language !== null) {
            $this->appendChild($this->_channel, 'language', $language);
        }
        if ($refresh !== null) {
            $this->appendChild($this->_channel, 'ttl', $refresh);
        }
        if ($build !== null) {
            $this->appendChild(
                $this->_channel, 'lastBuildDate', date('r', $build)
            );
        }
        
        $root->appendChild($this->_channel);
    }
    
    /**
     * Define channel image
     * @param $title string image title
     * @param $url string image url
     * @param $link string image link
     * @param $height string image description
     * @param $width string image width
     * @param $height string image height
     */
    public function setImage($title,$url,$link,$description=null,$width=null,
        $height=null)
    {
        $image = $this->_document->createElement('image');
        $this->appendChild($image, 'url', $url);
        $this->appendChild($image, 'title', $title);
        $this->appendChild($image, 'link', $link);
        if ($description !== null) {
            $this->appendChild($image, 'description', $description);
        }
        if ($width !== null) {
            $this->appendChild($image, 'width', $width);
        }
        if ($height !== null) {
            $this->appendChild($image, 'height', $height);
        }
        $this->_channel->appendChild($image);
    }
    
    /**
     * Add an item
     * @param $id string item id
     * @param $title string item title
     * @param $link string item link
     * @param $description string item description
     * @param $category string item category
     * @param $author string item author
     * @param $publication int item publication timestamp
     * @param $comments string item comments
     * @param $source string item source
     */
    public function addItem($id,$title,$link,$description,$category=null,
        $author=null,$publication=null,$comments=null,$source=null)
    {
        $item = $this->_document->createElement('item');
        $this->appendChild($item, 'guid', $id);
        $this->appendChild($item, 'title', $title);
        $this->appendChild($item, 'link', $link);
        $this->appendChild($item, 'description', $description);
        if ($category !== null) {
            $this->appendChild($item, 'category', $category);
        }
        if ($author !== null) {
            $this->appendChild($item, 'author', $author);
        }
        if ($publication !== null) {
            $this->appendChild($item, 'pubDate', date('r', $publication));
        }
        if ($comments !== null) {
            $this->appendChild($item, 'comments', $comments);
        }
        if ($source !== null) {
            $this->appendChild($item, 'source', $source);
        }
        $this->_channel->appendChild($item);
    }
    
    /**
     * Append child to a DOM element
     * @param $element \DOMElement $element
     * @param $name string $name
     * @param $value string value
     */
    private function appendChild(\DOMElement $element,$name,$value)
    {
        $element->appendChild($this->_document->createElement($name, $value));
    }
    
    /**
     * ToString
     */
    public function __toString()
    {
        return $this->_document->saveXML();
    }
    
}