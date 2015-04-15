<?php namespace App\Components\Memorials\Http\Controllers;

use App\Components\Memorials\Repositories\MemorialRepository;
use App\Components\Memorials\Repositories\PhotoAlbumRepository;
use App\Components\Memorials\Repositories\PhotoItemRepository;
use App\Http\Controllers\Controller;
use League\Flysystem\Exception;

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

    public function index() {
        $memorials = $this->memorial->all()->take(4);
        return view('Dashboard::'.$this->link_type.'.'.$this->current_theme.'.home', compact('memorials'));
    }

    /**
     * Show the profile of a Memorial
     * @param $slug
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        $guestbooks = $memorial->guestbooks->take(2);
        $albums = $memorial->photoAlbums->take(5);
        $timelines = $memorial->timelines->take(6);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.index', compact('memorial', 'guestbooks', 'albums', 'timelines'));
    }

    /**
     * Get the Biography of a memorial
     * @param $slug
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showBiography($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        $timelines = $memorial->timelines()->orderBy('year')->get();
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.biography', compact('memorial', 'timelines'));
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

    public function showPhotoItems($slug, $id, $aid, PhotoAlbumRepository $photoAlbumRepository){
        $memorial = $this->memorial->getElementById($id);
        $album = $memorial->photoAlbums()->find($aid);
        if(is_null($album)) {
            return redirect()->back()->withErrors('The Album not found!');
        }
        $photos = $album->photoItems()->paginate(10);

        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.photoItem', compact('memorial', 'album', 'photos'));
    }

    public function showPhoto($slug, $id, $pid, PhotoItemRepository $photoItemRepository){
        $photo = $photoItemRepository->getElementById($pid);
        if(\Request::ajax()) {
            if(!is_null($photo)) {
                return (String)view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.photo', compact('photo'));
            } else {
                return \Response::json('error', 400);
            }
        }
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.photo', compact('photo'));
    }


    public function showVideos($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        $videos = $memorial->videos()->paginate(6);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.video', compact('memorial', 'videos'));
    }
}