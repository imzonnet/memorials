<?php namespace App\Libraries\Videos;

use League\Flysystem\Exception;

class VideoHelper
{

    public $url;
    public $image;
    public $vid;
    public $host;
    public $time;

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
        $this->setTime();
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

    /**
     * @return mixed
     */
    public function getTime($f = ":")
    {
        return $this->format_time($this->time, $f);
    }

    /**
     * @param mixed $time
     */
    public function setTime()
    {
        if ($this->isYoutube($this->url)) {
            // set video data feed URL
            $feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $this->vid;
            // read feed into SimpleXML object
            $entry = simplexml_load_file($feedURL);
            // parse video entry
            $video = $this->parseVideoEntry($entry);
            $this->time = $video->length;
        } elseif ($this->isVimeo($this->url)) {
            try {
                $file = @file_get_contents("http://vimeo.com/api/v2/video/$this->vid.php");
                $hash = unserialize($file);
                $this->time =  $hash[0]['duration'];
            } catch(Exception $e) {
                $this->time = "00:00:00";
            }
        }
    }

    // function to parse a video <entry>
    public function parseVideoEntry($entry) {
        $obj= new \stdClass;

        // get nodes in media: namespace for media information
        $media = $entry->children('http://search.yahoo.com/mrss/');
        $obj->title = $media->group->title;
        $obj->description = $media->group->description;



        // get <yt:duration> node for video length
        $yt = $media->children('http://gdata.youtube.com/schemas/2007');
        $attrs = $yt->duration->attributes();
        $obj->length = $attrs['seconds'];


        // return object to caller
        return $obj;
    }

    public function format_time($t,$f=':') // t = seconds, f = separator
    {
        return sprintf("%02d%s%02d%s%02d", floor($t/3600), $f, ($t/60)%60, $f, $t%60);
    }

}