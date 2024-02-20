@extends('layouts.structure')

@section('content')
<div class="container-fluid">
    <br><br>
    <div class="row">
        @foreach($livresParCategorie as $livreCategorie)
            <div class="col-md-3">
                <div class="categorie-card">
                    <h3>Catégorie <br>{{ $livreCategorie->categorie }}</h3>
                    <p>Nombre différent de livres : <strong>{{ $livreCategorie->nombreLivres }}</strong></p>
                </div>
            </div>
        @endforeach
        <div class="col-md-3">
            <div class="categorie-card total-emprunt-card">
                <h3>Nombre total d'emprunt <br> </h3>
                <p><strong>{{ $totalEmprunts }}</strong></</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    .categorie-card, .total-emprunt-card {
        background-color: #fff;
        border: 2px solid #3498db;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .categorie-card h3, .total-emprunt-card h3 {
        color: #040008; 
    }

    .categorie-card p, .total-emprunt-card p {
        color: #666;
        margin-top: 8px;
    }
</style>
@endsection
