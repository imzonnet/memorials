<?php namespace App\Libraries\Videos;

use League\Flysystem\Exception;

class VideoHelper
{

    public $url;
    public $image;
    public $vid;
    public $host;

    /**
     * Video Helper Class
     */
    public function __construct() {

    }

    /**
     * Check Vimeo host
     * return bool
     */
    public function isVimeo($url, &$match = NULL)
    {
        if (preg_match('/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i', $url, $match)) {
            return true;
        }
        return false;
    }

    /*
     * Check Youtube Host
     * return bool
     */
    public function isYoutube($url, &$match = NULL)
    {
        if (preg_match('/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9_\-]+)/i', $url, $match)) {
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage()
    {
        if ($this->isYoutube($this->url)) {
            $this->image =  "http://img.youtube.com/vi/{$this->vid}/hqdefault.jpg";
        } elseif ($this->isVimeo($this->url)) {
            try {
                $file = @file_get_contents("http://vimeo.com/api/v2/video/$this->vid.php");
                $hash = unserialize($file);
                $this->image =  $hash[0]['thumbnail_large'];
            } catch(Exception $e) {
                $this->image = NULL;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
        $this->setVid();
        $this->setImage();
    }

    public function setVid() {
        if ($this->isVimeo($this->url, $match) || $this->isYoutube($this->url, $match)) {
            $this->vid = $match[1];
        } else {
            $this->vid = NULL;
        }
    }
    /**
     * @return mixed
     */
    public function getVid()
    {
        return $this->vid;
    }


}