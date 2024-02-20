@extends('layouts.structure')

@section('content')
<div class="container-fluid">
    <div class="container">
        <h1>Détails du Livre</h1>

        @foreach($detaillivre as $livre)
            <h2>Titre: {{ $livre->titre }}</h2>
            <p>Auteur: {{ $livre->auteur }}</p>
            <p>Année d'apparition: {{ $livre->annee }}</p>
            <p>Catégorie: {{ $livre->categorie }}</p>
        @endforeach
        <form method="POST" action="{{ route('commenter', $livre->id) }}">
            @csrf

            <div class="form-group">
                <label for="commentaire">Commentaire :</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="note">Note (sur 5) :</label>
                <input type="number" class="form-control" id="note" name="note" min="1" max="5" required>
            </div>

            <button type="submit" class="btn btn-primary">Soumettre le commentaire</button>
        </form>
        <h2>Commentaires</h2>
        @foreach($commentaires as $commentaire)
            <div class="card mb-3">
                <div class="card-body">
                    <p>Commentaire: {{ $commentaire->commentaire }}</p>
                    <p>Note: {{ $commentaire->note }}/5</p>
                </div>
            </div>
        @endforeach

        {{ $commentaires->links('vendor.pagination.custom') }}
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
