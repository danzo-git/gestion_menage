
@extends('layout.app')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'une Tache</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('taches.update', $tache->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <label class="label">nom de la tache</label>
                        <div class="control">
                          <input class="input @error('nom_tache') is-danger @enderror" type="text" name="nom_tache" value="{{ $tache->nom_tache }}" placeholder="Titre de la tache" required>
                        </div>
                        @error('nom_tache')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">responsable  de la tache</label>
                        <div class="control">
                            <select class="input  @error('proprietaire_tache') is-danger @enderror" type="text" name="proprietaire_tache" value="  " placeholder="proprietaire de la tache" required>
                            <option value="" disabled>choix du responsable</option>
                                <option value="Denzel">Denzel</option>
                            <option value="Grace kouame">Grace kouame</option>
                            <option value="Famien kouame">Famien kouame</option>
                            <option value="David yace">David yace</option>
                            </select>

                        </div>
                        @error('proprietaire_tache')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">date de diffusion</label>
                        <div class="control">
                          <input class="input" type="date" name="date" value="{{$tache->date}}" min="1950" max="{{ date('Y') }}">
                        </div>
                        @error('year')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Description de la tache</label>
                        <div class="control">
                            <textarea class="textarea" name="description_tache" placeholder="Description de la tache" required >{{$tache->description_tache}}</textarea>
                        </div>
                        @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="control">
                          <button class="button is-link">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
