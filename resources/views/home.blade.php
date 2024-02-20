@extends('layouts.structure')

@section('content')
<div class="container-fluid">
    <div class="container">
        <marquee behavior="" direction="right"><h1>Tous les livres disponibles</h1></marquee>
        <form method="GET" action="{{ route('home') }}">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="categorie">Catégorie :</label>
                    <select name="categorie" id="categorie" class="form-control">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie }}">{{ $categorie }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="auteur">Rechercher par Auteur :</label>
                    <input type="text" name="auteur" id="auteur" class="form-control" value="{{ request('auteur') }}">
                </div>
                <div class="col-md-4">
                    <label for="annee">Rechercher par Année :</label>
                    <input type="text" name="annee" id="annee" class="form-control" value="{{ request('annee') }}">
                </div><br><br><br><br>
                
                <div class="">
                    <button type="submit" class="btn btn-primary">Cliquer ici pour filtrer par catégorie,année ou auteur</button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach($livres as $livre)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title">Titre: {{ $livre->titre }}</h2>
                            <p class="card-text">Auteur: {{ $livre->auteur }}</p>
                            <p class="card-text">Année d'apparition: {{ $livre->annee }}</p>
                            <p class="card-text">Catégorie: {{ $livre->categorie }}</p>
                            <a href="commentaire/{{ $livre->id }}"><button class="btn btn-primary">Commentaire et Note</button></a>
                            <form method="POST" action="{{ route('livre_emprunter', $livre->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-warning">Emprunter</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $livres->links('vendor.pagination.custom') }}
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">
var pdfIframe = document.getElementById('pdfIframe');

pdfIframe.contentWindow.document.body.style.overflow = 'hidden';

pdfIframe.onload = function () {
    pdfIframe.contentWindow.document.body.style.overflow = 'hidden';
};
   
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
