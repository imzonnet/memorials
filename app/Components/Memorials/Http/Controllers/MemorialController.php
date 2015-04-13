<?php namespace App\Components\Memorials\Http\Controllers;

use App\Components\Memorials\Repositories\MemorialRepository;
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

}