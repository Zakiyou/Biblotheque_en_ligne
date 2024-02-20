@extends('layouts.structure')

@section('content')
<div class="container-fluid">
    <div class="container">
        <h1>Lire en Ligne : {{ $livre->titre }}</h1>
    
        <iframe
            src="{{ asset('administration/livre_pdf/' . $livre->fichier_pdf) }}#page=1"
            width="100%"
            height="800"
            
        ></iframe>
    </div>
    
</div>

@endsection

@section('script')

<script type="text/javascript">
   
</script>
@endsection

@section('style')
<style>
<link rel="stylesheet" href="{{ asset('pdfjs/web/viewer.css') }}">


   .msg
{
    display:none;
}

</style>

@endsection
