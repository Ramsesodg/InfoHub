<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Fiche;

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
        $profils = Profil::all();
        $profils = Profil::paginate(05); // 10 profils par page
        return view('pages.profils', compact('profils')); // Envoie les données à la vue

    }

    /**
     * Show the application contact.
     *
     * @return \Illuminate\View\View
     */
    public function fiches()
    {
        $fiches = Fiche::with('profil')->paginate(10); // Chargement des fiches avec les profils liés
        $profils = Profil::all(); // Récupération de tous les profils pour le formulaire
        return view('pages.fiches');
    }
}
