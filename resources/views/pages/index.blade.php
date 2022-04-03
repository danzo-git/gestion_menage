@extends('layout.app')
@include('layouts.app')

@section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        .is-info {
            margin: 0.3em;
        }
    </style>
@endsection

@section('content')
    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Menage Famille Kouame</p>
            <a class="button is-info" href="{{ route('taches.create') }}">Créer une tache</a>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>taches</th>
                            <th>nom & prenoms</th>
                            <th>photo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taches as $tache)
                            <tr>
                                <td>{{$tache->id }}</td>
                                <td><strong>{{ $tache->nom_tache }}</strong> </td>
                                <td>{{$tache->proprietaire_tache}}</td>
                                <td><img src="{{asset('image/'.$tache->image)}}" alt="" srcset=""  height="50" width="50"></td>
                                <td><a class="button is-primary" href="{{ route('taches.show', $tache->id) }}"> <span>Voir </span>  <i class="fa fa-eye"></i></a></td>
                                <td><a class="button is-warning" href="{{ route('taches.edit', $tache->id) }}">Modifier <i class="fa fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('taches.destroy', $tache->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Supprimer <i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer is-centered">
            {{ $taches->appends(request()->input())->links() }}
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@endsection
