<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Fiche;
use Illuminate\Http\Request;


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

    public function index(Request $request)
    {
        $profils = Profil::all();
        $search = $request->input('search');

        $profils = Profil::when($search, function ($query, $search) {
            $query->where('nom', 'like', "%$search%")
                ->orWhere('prenom', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('telephone', 'like', "%$search%");
        })->paginate(02);

        return view('pages.profils', compact('profils', 'search'));
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

    public function showSidebar()
{
    $profil = Profil::all();
    return view('layouts.partials.sidebar', compact('profil'));
}

}
