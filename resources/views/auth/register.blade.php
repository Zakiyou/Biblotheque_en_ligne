@extends('layouts.structure')

@section('content')
<div class="container-fluid">
    <br><br>
  <div class="row">
    <div class="container formulaire">
        <div class="pd-ltr-20 xs-pd-20-10">
          <div class="row justify-content-center bg-light-purple">
              <div class="col-md-8">
                  <div class="card">

                      <div class="card-header bg-primary text-center"><span style="color:rgb(250, 244, 244);font-weight:bold;font-size:20px;">Inscription</span></div>

                      <div class="card-body" id="divman">
                          <form method="POST" action="{{ route('postutilisateur') }}" id="Publication" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Nom') }}</strong></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

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
                                          {{ __('S\'inscrire') }}
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
@endsection
