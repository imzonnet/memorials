<?php namespace App\Components\Dashboard\Http\Controllers;

use App\Components\Memorials\Models\Memorial;
use App\Components\Memorials\Repositories\MemorialRepository;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index(MemorialRepository $memorialRepository) {

        $memorials = $memorialRepository->all()->take(4);
        return view('Dashboard::'.$this->link_type.'.'.$this->current_theme.'.home', compact('memorials'));
    }

}