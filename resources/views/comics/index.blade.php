@extends('layouts.app')

@section('content')
<main>
    <div class="row">
        @foreach ($comics as $data )
        <div class="col-3">
            <div class="card text-bg-dark">
                <img src="{{ $data->img }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title"> {{$data->title}} </h5>
                    <p class="card-text">{{ $comic->description }}</p>
                    <p class="card-text"><small> {{ $comic->series }} </small></p>
                    <p class="card-text"><small> {{ $comic->sale_date }} </small></p>
                    <p class="card-text"><small> {{ $comic->type }} </small></p>
                    <div class="card-body">
                        <a href="#" class="card-link">{{ $comic->price }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection