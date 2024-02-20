<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Livre;
class CommentaireController extends Controller
{   public function getcommentaire($id)
    {
      $commentaires=Commentaire::where('livre_id','=',$id)->paginate(10);
      $detaillivre=Livre::where('id','=',$id)->get();
      return view('commentaire',compact('commentaires','detaillivre'));
    }
    public function commenter(Request $request, $id)
    {
        $request->validate([
            'commentaire' => 'required|string',
            'note' => 'required|integer|min:1|max:5',
        ]);

        $livre = Livre::findOrFail($id);

        $commentaire = new Commentaire([
            'commentaire' => $request->input('commentaire'),
            'note' => $request->input('note'),
            'user_id' => auth()->user()->id,
            'livre_id' => $livre->id,
        ]);

        $commentaire->save();

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
    }
}
