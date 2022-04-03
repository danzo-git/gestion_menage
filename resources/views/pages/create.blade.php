           @extends('layout.app')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création de tache</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('taches.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">nom de la tache</label>
                        <div class="control">
                          <input class="input @error('nom_tache') is-danger @enderror" type="text" name="nom_tache" value="{{ old('title') }}" placeholder="Titre de la tache" required>
                        </div>
                        @error('nom_tache')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">responsable  de la tache</label>
                        <div class="control">
                            <select class="input  @error('proprietaire_tache') is-danger @enderror" type="text" name="proprietaire_tache" value="{{ old('proprietaire_tache') }}" placeholder="proprietaire de la tache" required>
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
                          <input class="input" type="date" name="date" value="{{ old('year') }}" min="1950" max="{{ date('Y') }}" required>
                        </div>
                        @error('year')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!----------->
                    <div class="field">
                        <label class="label">photo</label>
                        <div class="control">
                          <input class="file" type="file" name="image" required >
                        </div>
                        @error('image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!--------->
                    <div class="field">
                        <label class="label">Description de la tache</label>
                        <div class="control">
                            <textarea class="textarea" name="description_tache" placeholder="Description de la tache" required>{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="control">
                          <button class="button is-link">Envoyer</button>
                      {{-- @php
                           dd($POST);
                      @endphp    --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!---script>
        $(() => {
            $('input[type="file"]').on('change', (e) => {
                let that = e.currentTarget
                if (that.files && that.files[0]) {
                    $(that).next('.custom-file-label').html(that.files[0].name)
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        })
    </script---->
@endsection
