<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use App\Models\Emprunt;
use Illuminate\Http\Request;

class AdministrationStatistiqueController extends Controller
{
    public function getstatistique()
    {
        $livresParCategorie = Livre::groupBy('categorie')->selectRaw('categorie, COUNT(*) as nombreLivres')->get();
        $totalEmprunts = Emprunt::count();

        return view('dashboard/statistique', compact('livresParCategorie','totalEmprunts'));
    }
   
}
