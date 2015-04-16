<?php namespace App\Components\Memorials\Http\Controllers;

use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\PhotoAlbumRepository;
use App\Components\Memorials\Repositories\PhotoItemRepository;
use App\Http\Controllers\Controller;
use League\Flysystem\Exception;

class PhotoController extends Controller
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

    /**
     * Get list album of a memorial
     * @param $slug
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showPhotoAlbums($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        $albums = $memorial->photoAlbums()->paginate(6);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.photos.photoAlbum', compact('memorial', 'albums'));
    }

    /**
     * Show list photo of an album
     * @param $slug
     * @param $id
     * @param $aid
     * @param PhotoAlbumRepository $photoAlbumRepository
     * @return $this|\Illuminate\View\View
     */
    public function showPhotoItems($slug, $id, $aid, PhotoAlbumRepository $photoAlbumRepository){
        $memorial = $this->memorial->getElementById($id);
        $album = $memorial->photoAlbums()->find($aid);
        if(is_null($album)) {
            return redirect()->back()->withErrors('The Album not found!');
        }
        $photos = $album->photoItems()->paginate(10);

        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.photos.photoItem', compact('memorial', 'album', 'photos'));
    }


    public function show($slug, $id, $pid){
        $memorial = $this->memorial->getElementById($id);
        $photo = $this->photo->getElementById($pid);
        $comments = $photo->comments()->orderBy('id', 'desc')->get();
        if(\Request::ajax()) {
            if(!is_null($photo)) {
                return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.photos.photoDetail', compact('memorial', 'photo', 'comments'));
            } else {
                return \Response::json('error', 400);
            }
        }
        return redirect()->intended();
    }

    public function comment(){
        echo 1;
    }

}