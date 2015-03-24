<?php namespace App\Components\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }
    function index() {
       return view('Dashboard::'.$this->link_type.'.'.$this->current_theme.'.app');
    }

}