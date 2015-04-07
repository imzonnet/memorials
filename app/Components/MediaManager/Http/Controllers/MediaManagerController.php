<?php namespace App\Components\MediaManager\Http\Controllers;

use App\Http\Controllers\Controller;

class MediaManagerController extends Controller
{

    protected $path;
    protected $file_name;

    public function __construct() {
        parent::__construct();
        $this->path = 'public/uploads/';
    }

    public function upload($file, $upload_path = '/') {
        $this->setPath($upload_path);
        if(!is_dir($this->path)) {
            \Storage::makeDirectory($this->path);
        }
        $this->setFileName($file);
        $file->move($this->getPath(), $this->getFileName());
        return $this->getPath() .'/'. $this->getFileName();
    }

    public function setPath($upload_path) {
        $this->path = $this->path . trim($upload_path, '/');
    }

    public function setFileName($file) {
        $this->file_name = date("Y_m_d_H_i_s") . '_' . $file->getClientOriginalName();
    }
    public function getPath() {
        return $this->path;
    }
    public function getFileName() {
        return $this->file_name;
    }
}