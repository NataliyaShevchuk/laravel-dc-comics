@extends('layouts.app')

@section('content')
<main>

    <h1>{{ $data->title }} (#{{ $data->id }})</h1>

    <div class="d-flex gap-3">
        <a href="{{ route('comics.edit', $data->id) }}" class="btn btn-link">
        <i class="fas fa-pencil"></i>
        </a>

        <form action="{{ route('comics.destroy', $data->id) }}" method="POST" id="form-delete">
        @csrf()
        @method('delete')

        <button class="btn btn-danger">
            <i class="fas fa-trash"></i>
            Elimina
        </button>
        </form>
    </div>

    <script>
        // recuperiamo l'elemnto html del form
        const form = document.getElementById("form-delete");
        // aggiungiamo un event listener sul submit
        form.addEventListener("submit", function(e) {
        // blocchiamo il comportamento di default
        e.preventDefault();
        // chiediamo all'utente di confermare
        const conferma = confirm("Sei sicuro di voler cancellare questo prodotto? Proprio sicuro sicuro?");
        // Se conferma, inviamo il form
        if (conferma === true) {
            form.submit();
        }
        })
    </script>

    <p class="lead">{!! $data->description !!}</p>
    <ul>
        <li><strong>Prezzo:</strong> {{ $data->price }}</li>
        <li><strong>Privacy:</strong> {{ $data->series === 1 ? 'Si' : 'No' }}</li>
        <li><strong>Data d'uscita:</strong> {{ $data->sale_date }}</li>
    </ul>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">
        <a href="{{ route('comics.create')}}" class="text-decoration-none text-white">Back</a>
        </button>
    </div>

</main>
@endsection