<?php namespace App\Components\Memorials\Http\Controllers;

use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\PhotoAlbumRepository;
use App\Components\Memorials\Repositories\PhotoItemRepository;
use App\Http\Controllers\Controller;
use League\Flysystem\Exception;

class PhotoItemController extends Controller
{
    /**
     * The memorial memorial
     * @var memorialRepository
     */
    protected $memorial;
    protected $photo;

    /**
     * Display a listing of the resource.
     *
     * @param MemorialRepository $memorial
     * @param TimeLineRepository $timeline
     */
    public function __construct(MemorialRepository $memorial, PhotoItemRepository $photoItemRepository)
    {
        parent::__construct();
        $this->memorial = $memorial;
        $this->photo = $photoItemRepository;
    }

    public function show($slug, $id, $pid){
        $photo = $this->photo->getElementById($pid);
        $comments = $photo->comments()->get();
        if(\Request::ajax()) {
            if(!is_null($photo)) {
                return (String)view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.photo', compact('photo', 'comments'));
            } else {
                return \Response::json('error', 400);
            }
        }
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.photo', compact('photo', 'comments'));
    }

}