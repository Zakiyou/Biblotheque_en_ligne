<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprunt;
class EmpruntController extends Controller
{
    public function emprunter($livreId)
    {
            Emprunt::create([
                'livre_id' => $livreId,
                'user_id' => auth()->user()->id,
                'date_emprunt' => now(),
            ]);
            $emprunts = Emprunt::where('user_id', auth()->user()->id)->get();

            return view('mes_emprunts', compact('emprunts'));
       
    }
    public function mesEmprunts()
    {
  
         $emprunts = Emprunt::where('user_id', auth()->user()->id)->get();

         return view('mes_emprunts', compact('emprunts'));
    }
    public function listeEmprunts()
    {
    $emprunts = Emprunt::with(['livre', 'user'])->get();

    return view('dashboard/emprunts', ['emprunts' => $emprunts]);
    }
    
    public function Deleteemprunt($id)

   {
    Emprunt::where('id','=',$id)->delete();
    return redirect()->route('liste_emprunts')->with('succes','Suppression effectuée avec succès');

   }

}
