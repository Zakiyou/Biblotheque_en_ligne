<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $livres = Livre::query();

        if ($request->filled('categorie')) {
            $livres->where('categorie', $request->input('categorie'));
        }

        if ($request->filled('auteur')) {
            $livres->where('auteur', 'like', '%' . $request->input('auteur') . '%');
        }

        if ($request->filled('annee')) {
            $livres->where('annee', $request->input('annee'));
        }

        $livres = $livres->paginate(10);
        $categories = Livre::pluck('categorie')->unique();

        return view('home', compact('livres', 'categories'));
    }
}
