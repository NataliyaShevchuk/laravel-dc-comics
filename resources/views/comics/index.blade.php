
@extends('layouts.app')

@section('content')
<main>
    <div class="row g-4">
        @foreach ($data as $comic )
        <div class="col-md-4">
            <div class="card text-bg-dark">
                <img src="{{ $comic->img }}" class="card-img" alt="copertina fumetto">
                <div class="card-img-overlay">
                    <h5 class="card-title"> {{$comic->title}} </h5>
                    <p class="card-text">{{ $comic->description }}</p>
                    <p class="card-text"><small> {{ $comic->series }} </small></p>
                    <p class="card-text"><small> {{ $comic->sale_date }} </small></p>
                    <p class="card-text"><small> {{ $comic->type }} </small></p>
                    <div class="card-body">
                        <button class="btn btn-danger"><a href="#" class="card-link text-white">{{ $comic->price }}</a></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection