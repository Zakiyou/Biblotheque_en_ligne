@extends('layouts.structure')

@section('content')
<div class="container-fluid">
    <div class="container">
        <h1>Mes Emprunts</h1>
      <div class="row">
        @foreach($emprunts as $emprunt)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Titre: {{ $emprunt->livre->titre }}</h5>
                    <p class="card-text">Auteur: {{ $emprunt->livre->auteur }}</p>
                    <p class="card-text">Date d'emprunt: {{ \Carbon\Carbon::parse($emprunt->date_emprunt)->format('d/m/Y à H:i:s') }}</p>
                    <a href="{{ route('lire_en_ligne', ['id' => $emprunt->livre->id]) }}" class="btn btn-success">Lire</a>
                </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>
    
</div>

@endsection

@section('script')

<script type="text/javascript">

   
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
