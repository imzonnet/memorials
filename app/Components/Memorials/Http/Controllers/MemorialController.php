<?php namespace App\Components\Memorials\Http\Controllers;

use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\PhotoAlbumRepository;
use App\Components\Memorials\Repositories\PhotoItemRepository;
use App\Http\Controllers\Controller;

class MemorialController extends Controller
{
    /**
     * The memorial memorial
     * @var memorialRepository
     */
    protected $memorial;

    /**
     * Display a listing of the resource.
     *
     * @param MemorialRepository $memorial
     * @param TimeLineRepository $timeline
     */
    public function __construct(MemorialRepository $memorial)
    {
        parent::__construct();
        $this->memorial = $memorial;
    }

    public function index()
    {
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.index');
    }
    public function biography()
    {
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.biography');
    }
    public function photoAlbum()
    {
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.photoAlbum');
    }
    public function album()
    {
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.album');
    }
    public function video()
    {
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.video');
    }

    /**
     *
     */
    public function show($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        $guestbooks = $memorial->guestbooks->take(2);

        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.index', compact('memorial', 'guestbooks'));
    }

    /**
     * Get the Biography of a memorial
     * @param $slug
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showBiography($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.biography', compact('memorial'));
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
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.photoAlbum', compact('memorial', 'albums'));
    }

    /**
     * Show list photo of a album
     * @param $slug
     * @param $id
     * @param $pid
     * @param PhotoAlbumRepository $photoAlbumRepository
     * @return \Illuminate\View\View
     */
    public function showAlbum($slug, $id, $pid, PhotoAlbumRepository $photoAlbumRepository){
        $memorial = $this->memorial->getElementById($id);
        $album = $photoAlbumRepository->getElementById($pid);
        $photos = $album->photoItems()->paginate(10);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.photoItem', compact('memorial', 'album', 'photos'));
    }

    public function showPhotoItems($slug, $id, $pid, PhotoAlbumRepository $photoAlbumRepository){
        $memorial = $this->memorial->getElementById($id);
        $album = $photoAlbumRepository->getElementById($pid);
        $photos = $album->photoItems()->paginate(10);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.photoItem', compact('memorial', 'album', 'photos'));
    }

    public function showVideos($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        $videos = $memorial->videos()->paginate(6);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.video', compact('memorial', 'videos'));
    }
}