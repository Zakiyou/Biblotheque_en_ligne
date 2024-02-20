<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route pour accéder à Administration Utilisateur
Route::get('/utilisateur', [App\Http\Controllers\AdministrationUtilisateursController::class, 'getutilisateur'])->name('getutilisateur')->middleware('auth');
//Route pour ajouter utilisateur POST
Route::POST('/utilisateur', [App\Http\Controllers\AdministrationUtilisateursController::class, 'AdduserByAdmin'])->name('postutilisateur')->middleware('auth');
//Route pour supprimer un utilisateur
Route::get('utilisateur/sup/{id}', [App\Http\Controllers\AdministrationUtilisateursController::class, 'Deleteuser'])->name('deleteutilisateur')->middleware('auth');
//Route pour accéder à Administration livre
Route::get('/livre', [App\Http\Controllers\AdministrationlivreController::class, 'getlivre'])->name('getlivre')->middleware('auth');
//Route pour ajouter un livre
Route::post('/livre', [App\Http\Controllers\AdministrationlivreController::class, 'Addlivre'])->name('postlivre')->middleware('auth');
//Route pour supprimer un livre
Route::get('livre/sup/{id}', [App\Http\Controllers\AdministrationlivreController::class, 'Deletelivre'])->name('deletelivre')->middleware('auth');
//Route pour accéder à Administration Statistique
Route::get('/statistique', [App\Http\Controllers\AdministrationStatistiqueController::class, 'getstatistique'])->name('statistique')->middleware('auth');
//Route pour accéder aux commentaire
Route::get('/commentaire/{id}', [App\Http\Controllers\CommentaireController::class, 'getcommentaire'])->name('commentaire')->middleware('auth');
//Route  pour valider la publication de commentaire
Route::post('/commenter/{id}', [App\Http\Controllers\CommentaireController::class, 'commenter'])->name('commenter')->middleware('auth');
//Route pour emprunter un livre
Route::post('/livre/emprunter/{livreId}', [App\Http\Controllers\EmpruntController::class, 'emprunter'])->name('livre_emprunter')->middleware('auth');
//Route pour voir mes emprunts
Route::get('/mes_emprunts', [App\Http\Controllers\EmpruntController::class, 'mesEmprunts'])->name('mes_emprunts')->middleware('auth');
//Route pour lire un livre en ligne
Route::get('/lire_en_ligne/{id}', [App\Http\Controllers\AdministrationlivreController::class,'lireEnLigne'])->name('lire_en_ligne')->middleware('auth');
//Route pour liste des emprunts (dashboard)
Route::get('/liste_emprunts', [App\Http\Controllers\EmpruntController::class, 'listeEmprunts'])->name('liste_emprunts');
//Route pour supprimer un emprunt (dashboard)
Route::get('emprunts/sup/{id}', [App\Http\Controllers\EmpruntController::class, 'Deleteemprunt'])->name('deleteemprunt')->middleware('auth');

