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
        return view('Memorials::'.$this->link_type.'.'.$this->current_theme.'.home', compact('memorials'));
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
     * Show list video of a memorial
     * @param $slug
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showVideos($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        $videos = $memorial->videos()->paginate(6);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.video', compact('memorial', 'videos'));
    }

    /**
     * Show list guestbook of a memorial
     * @param $slug
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showGuestbooks($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        $guestbooks = $memorial->guestbooks()->paginate(6);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.guestbook', compact('memorial', 'guestbooks'));
    }

    /**
     * Show Family tree of a memorial
     * @param $slug
     * @param $id
     * @return \Illuminate\View\View
     */
    public function showFamily($slug, $id){
        $memorial = $this->memorial->getElementById($id);
        $guestbooks = $memorial->guestbooks()->paginate(6);
        return view('Memorials::' . $this->link_type . '.' . $this->current_theme . '.memorials.guestbook', compact('memorial', 'guestbooks'));
    }

}