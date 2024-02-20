@extends('layouts.structure')

@section('content')
<div class="container-fluid">
    <div class="card-box pd-20 height-100-p mb-30">
        <br>
        <div class="row align-items-center">
            <div class="col-md-4 affiche">
                <button class="btn btn-primary boutonajouter">Nouveau livre</button>
            </div>
            <div class="col-md-4 ferme">
                <button class="btn btn-danger boutonannuller">Fermer formulaire</button>
            </div>
        </div>
    </div><br><br>

    <div class="row">
        <div class="container formulaire">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="row justify-content-center bg-light-purple">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-center">
                                <span style="color:rgb(250, 244, 244);font-weight:bold;font-size:20px;">Ajouter un Livre</span>
                            </div>

                            <div class="card-body" id="divman">
                                <form method="POST" action="{{ route('postlivre') }}" id="AjoutLivreForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="titre" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Titre') }}</strong></label>
                                        <div class="col-md-6">
                                            <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}" required autocomplete="titre" autofocus>
                                            @error('titre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><br><br>

                                    <div class="form-group row">
                                        <label for="auteur" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Auteur') }}</strong></label>
                                        <div class="col-md-6">
                                            <input id="auteur" type="text" name="auteur" class="form-control @error('auteur') is-invalid @enderror" value="{{ old('auteur') }}" required autocomplete="auteur" autofocus>
                                            @error('auteur')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><br><br>

                                    <div class="form-group row">
                                        <label for="annee" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Année') }}</strong></label>
                                        <div class="col-md-6">
                                            <input id="annee" type="text" name="annee" class="form-control @error('annee') is-invalid @enderror" value="{{ old('annee') }}" required autocomplete="annee" autofocus>
                                            @error('annee')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><br><br>

                                    <div class="form-group row">
                                        <label for="categorie" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Catégorie') }}</strong></label>
                                        <div class="col-md-6">
                                            <select id="categorie" name="categorie" class="form-control @error('categorie') is-invalid @enderror" required>
                                                <option value="" selected disabled>Sélectionnez une catégorie</option>
                                                <option value="Roman">Roman</option>
                                                <option value="Informatique">Informatique</option>
                                                <option value="Mystère">Mystère</option>
                                                <option value="Médécine">Médécine</option>
                                                <option value="Mathématique">Mathématique</option>
                                                
                                            </select>
                                            @error('categorie')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><br><br>
                                    <div class="form-group row">
                                        <label for="pdf" class="col-md-4 col-form-label text-md-right"><strong>{{ __('PDF du Livre') }}</strong></label>
                                        <div class="col-md-6">
                                            <input id="pdf" type="file" name="pdf" class="form-control @error('pdf') is-invalid @enderror" accept=".pdf">
                                            @error('pdf')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><br><br>
                                    <div class="form-group row">
                                        <label for="nombre_livres" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Nombre de Livres Présents') }}</strong></label>
                                        <div class="col-md-6">
                                            <input id="nombre_livres" type="number" name="nombre_livres" class="form-control @error('nombre_livres') is-invalid @enderror" value="{{ old('nombre_livres') }}" required autocomplete="nombre_livres" autofocus>
                                            @error('nombre_livres')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><br><br>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary valider">
                                                {{ __('Ajouter') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Gestion livre</h4>
          </div>
          
          <div class="card-body">

            <div class="table-responsive">
                
                <table id="gestionlivre" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id du livre</th>
                            <th>titre</th>
                            <th>auteur</th>
                            <th>Categorie</th>
                            <th>Année</th>
                            <th>Nombre disponible</th>
                            <th>Opération</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($livres as $livre)

                        <tr>
                            <td>{{ $livre->id }}</td>
                            <td>{{ $livre->titre }}</td>
                            <td>{{ $livre->auteur }}</td>
                            <td>{{ $livre->categorie }}</td>
                            <td>{{ $livre->annee }}</td>
                            <td>{{ $livre->Nombre_disponible }}</td>
                            
                            <td>
                                
                         
                                <button type="button" class="btn btn-primary view-pdf" title="Voir PDF" data-toggle="modal" data-target="#exampleModalCenterimage{{ $livre->id }}">
                                    <i class="material-icons">&#xE417;</i>
                                </button>
                                <div class="modal fade viewPdfModal" tabindex="-1" role="dialog" aria-labelledby="viewPdfModalLabel" aria-hidden="true"id="exampleModalCenterimage{{ $livre->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewPdfModalLabel">Aperçu du PDF</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe id="pdfViewer" width="100%" height="600px" frameborder="0" src="{{ asset('administration/livre_pdf/' . $livre->fichier_pdf) }}"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-warning edit" title="Modifier" data-toggle="tooltip">
                                    <i class="material-icons">&#xE254;</i>
                                </button>
                                <button type="button" class="btn btn-danger delete" title="Supprimer" data-toggle="modal" data-target="#exampleModalconfirmation{{ $livre->id }}">
                                    <i class="material-icons">&#xE872;</i>
                                </button>
                                <div class="modal fade" id="exampleModalconfirmation{{ $livre->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                           Voulez-vous vraiment supprimer cet livre en ligne ?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                          <a href="livre/sup/{{$livre->id}}"><button type="button" class="btn btn-primary">Oui</button></a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                
                            
                            </td>
                        </tr>
                        
                        @endforeach
                        
                       
                        
                    </tbody>
                    
                </table>
            </div>
          </div>
        </div>
        
      </div>



    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function(){
    var val='';
        //Affichage du formulaire suite au clic
        $('.boutonajouter').click(function()
        { $('.affiche').hide('slow');
           $('.formulaire').show('slow');
           $('.ferme').show('slow');

        }) ;
        //Disparition du formulaire suite au clic
        $('.boutonannuller').click(function()
        {$('.ferme').hide('slow');
            $('.affiche').show('slow');
           $('.formulaire').hide('slow');

        }) ;

   //Si le formulaire contient d'erreur ,je l'affiche
    $valeur=$('#Publication div span strong ').text();
    if($valeur!=='')
    {
        $('.formulaire').show();

    }
    //Disparition du message d'erreur après 10s;
    setTimeout(function(){
    var obj=document.getElementById('message');

    var objquery=$(obj);
    objquery.hide();
    },10000);
 

    new DataTable('#gestionlivre');

});

</script>
@endsection

@section('style')
<style>
   .msg
{
    display:none;
}
.formulaire
{
    display:none;
}
.ferme
{
    display:none;
}
ol li
{
margin:auto;
display:inline;
}

</style>

@endsection
