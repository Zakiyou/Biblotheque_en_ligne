@extends('layouts.structure')

@section('content')
<br><br>
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Gestion Emprunt</h4>
          </div>
          
          <div class="card-body">

            <div class="table-responsive">
                
                <table id="gestionemprunts" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id emprunt</th>
                            <th>Titre du livre</th>
                            <th>Auteur</th>
                            <th>Categorie</th>
                            <th>Lecteur</th>
                            <th>Date emprunt</th>
                            <th>Opération</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emprunts as $emprunt)

                        <tr>
                            <td>{{ $emprunt->id }}</td>
                            <td>{{ $emprunt->livre->titre }}</td>
                            <td>{{  $emprunt->livre->auteur }}</td>
                            <td>{{  $emprunt->livre->categorie }}</td>
                            <td>{{ $emprunt->user->name }} {{ $emprunt->user->prenom }}</td>
                            <td>{{ \Carbon\Carbon::parse($emprunt->date_emprunt)->format('d/m/Y à H:i:s') }}</td>
                            
                            <td>
                                
                                <button type="button" class="btn btn-danger delete" title="Supprimer" data-toggle="modal" data-target="#exampleModalconfirmation{{ $emprunt->id }}">
                                    <i class="material-icons">&#xE872;</i>
                                </button>
                                <div class="modal fade" id="exampleModalconfirmation{{ $emprunt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                           Voulez-vous vraiment supprimer cet emprunt en ligne ?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                          <a href="emprunts/sup/{{$emprunt->id}}"><button type="button" class="btn btn-primary">Oui</button></a>
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
 
    //Disparition du message d'erreur après 10s;
    setTimeout(function(){
    var obj=document.getElementById('message');

    var objquery=$(obj);
    objquery.hide();
    },10000);
 

    new DataTable('#gestionemprunts');

});

</script>
@endsection

@section('style')
<style>
   .msg
{
    display:none;
}

</style>

@endsection
