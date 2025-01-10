<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.profils');
    }

    /**
     * Show the application contact.
     *
     * @return \Illuminate\View\View
     */
    public function fiches()
    {
        return view('pages.fiches');
    }
}
