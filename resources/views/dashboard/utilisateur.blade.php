@extends('layouts.structure')

@section('content')
<div class="container-fluid">
    <div class="card-box pd-20 height-100-p mb-30">
      <br>
        <div class="row align-items-center">
            <div class="col-md-4 affiche">
                <button class="btn btn-primary boutonajouter">Nouveau utilisateur</button>
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

                      <div class="card-header bg-primary text-center"><span style="color:rgb(250, 244, 244);font-weight:bold;font-size:20px;">Utilisateurs</span></div>

                      <div class="card-body" id="divman">
                          <form method="POST" action="{{ route('postutilisateur') }}" id="Publication" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Nom') }}</strong></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div><br><br>
                              <div class="form-group row">
                                  <label for="prenom" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Prenom') }}</strong></label>

                                  <div class="col-md-6">
                                      <input id="prenom" type="text" name="prenom"class="form-control @error('prenom') is-invalid @enderror" titre="prenom" value="{{ old('prenom') }}"  required autocomplete="prenom" autofocus>

                                      @error('prenom')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div><br><br>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Email Address') }}</strong></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br><br>
                            
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Password') }}</strong></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br><br>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Confirm Password') }}</strong></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div><br><br>

                            <div class="form-group row mb-0 ">
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
            <h4>Gestion utilisateurs</h4>
          </div>
          
          <div class="card-body">

            <div class="table-responsive">
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" id="myInputnom" onkeyup="Recherche(0)" placeholder="Rechercher par Nom.." class="form-control">
                    <input type="email" id="myInputemail" onkeyup="Recherche(2)" placeholder="Rechercher par Email.." class="form-control">
                </div>
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th>Numéro</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email Adresse</th>
                    <th>Statut</th>
                    <th>Opération</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($user as $users)
                  <tr>
                    <th scope="row">{{$users->id}}</th>
                    <td>{{$users->name}}</td>
                    <td>{{$users->prenom}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->statut}}</td>
                    <td><button  type="button"class="btn btn-danger"data-toggle="modal" data-target="#exampleModalconfirmation{{ $users->id }}"><i class="fa fa-trash"></i></button></td>
                    <!-- demande de confirmation de suppression -->
                    <div class="modal fade" id="exampleModalconfirmation{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                             Voulez-vous vraiment supprimer l'utilisateur ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                            <a href="utilisateur/sup/{{$users->id}}"><button type="button" class="btn btn-primary">Oui</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- fin de modal de confirmation -->
                  </tr>
                  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{ $user->links('vendor.pagination.custom') }}
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
 
});
function Recherche(index) {
        var input, filter, table, tr, td, i, txtValue;
        input = index === 0 ? document.getElementById("myInputnom") : document.getElementById("myInputemail");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[index];
            if (td) {
                txtValue = td.textContent || td.innerText;
                tr[i].style.display = (txtValue.toUpperCase().indexOf(filter) > -1) ? "" : "none";
            }
        }
    }
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
