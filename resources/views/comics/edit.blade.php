@extends('layouts.app')

@section('content')
<main>
    <div class="row">
        <div class="col-12 mt-5 justify-content-center">
            <form  action=" {{route('comics.update',  $data->$id) }} " class="row g-3" method="POST">
                @csrf 

                @method('put')
                <div class="col-md-6">
                    <label for="text" class="form-label">Title</label>
                    <input type="text" class="form-control" id="" name="title" value="{{ $data->title}}">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Price</label>
                    <input type="number" step=".01" class="form-control" name="price" value="{{ $data->price}}">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Sale date</label>
                    <input type="text" class="form-control" id="" placeholder="Date" name="sale_date" value="{{ $data->sale_date}}">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="" placeholder="Description" name="description">{{ $data->description}}</textarea>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="series" id="flexCheckDefault"
                            {{ $data->series ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Serie
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>


            </form>
        </div>
    </div>
</main>
@endsection