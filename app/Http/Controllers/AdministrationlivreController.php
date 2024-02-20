<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
class AdministrationlivreController extends Controller
{
    public function getlivre()
    {
      $livres = Livre::all();
      return view('dashboard/livre',compact('livres'));
    }

    public function Addlivre(Request $request)
  {

    $request->validate([
        'titre' => 'required|string|max:255',
        'auteur' => 'required|string|max:255',
        'annee' => 'required|integer|min:1900|max:' . date('Y'),
        'categorie' => 'required|string|max:255',
        'pdf' => 'required|mimes:pdf|max:2048',
        'nombre_livres' => 'required|integer|min:1'
    ]);

    $livre = new Livre();
    $livre->titre = $request->titre;
    $livre->auteur = $request->auteur;
    $livre->annee = $request->annee;
    $livre->categorie = $request->categorie;
    $livre->Nombre_disponible = $request->nombre_livres; 

    $nom_pdf=$request->file('pdf')->getClientOriginalName();
    $request->file('pdf')->move(public_path('administration/livre_pdf'),$nom_pdf);

    $livre->fichier_pdf=$nom_pdf;
    $livre->save();
  
    return redirect()->route('getlivre')->with('succes','Ajout du livre effectué avec succès');
  }
  public function Deletelivre($id)

   {
    $livre=Livre::where('id','=',$id)->get();
    foreach($livre as $livre)
    {

        $fichier =public_path('administration/livre_pdf/'.$livre->fichier_pdf);
         if( file_exists ( $fichier))
           unlink( $fichier ) ;

         Alternative:

         @unlink( $fichier ) ;

    }
    Livre::where('id','=',$id)->delete();
    return redirect()->route('getlivre')->with('succes','Suppression du livre effectué avec succès');

  }
  public function lireEnLigne($id)
  {
      $livre = Livre::findOrFail($id);
  
      return view('lire_en_ligne', ['livre' => $livre]);
  }
}
