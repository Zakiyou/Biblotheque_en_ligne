<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AdministrationUtilisateursController extends Controller
{
    public function getutilisateur()
    {
      $user=User::latest()->paginate(10);
      return view('dashboard/utilisateur',compact('user'));
    }
    public function AdduserByAdmin(Request $request)
    {

        
        $donnee=request()->validate(
            [  'name' => ['required', 'string', 'max:255'],
            'prenom'=> ['required', 'string', 'max:255' ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
         );
         $user=new User();
         $user->name=$donnee['name'];
         $user->prenom=$donnee['prenom'];
         $user->email= $donnee['email'];
         if (auth()->guest()) {
            $user->statut="non admin";
         } else {
            $user->statut="admin";
         }

         $user->password= Hash::make($donnee['password']);
         $user->save();
         return redirect()->route('getutilisateur')->with('succes','Ajout d\'utilisateur effectué avec succès');

    }

    public function Deleteuser($id)

   {
    User::where('id','=',$id)->delete();
    return redirect()->route('getutilisateur')->with('succes','Suppression de l\'utiisateur effectuée avec succès');

   }
}
