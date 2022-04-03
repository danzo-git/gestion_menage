@extends('layout.app')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Nom de Tache: {{ $tache->nom_tache}}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Description de la tache : </p>
                
                <p>{{$tache->description_tache}}</p>
            </div>
        </div>
    </div>
@endsection
