@extends('layouts.app')

@section('content')
<main>
    {{-- validazione dati --}}
  @if ($errors->any())
  <div class="alert alert-danger">
      I dati inseriti non sono validi:

      <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif


    <div class="row">
        <div class="col-12 mt-5 justify-content-center">
            <form  action=" {{route('comics.store') }} " class="row g-3" method="POST">
                @csrf 

                <div class="col-md-6">
                    <label for="text" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror" id="" name="title"
                    value="{{ $errors->has('title') ? '' : old('title') }}">

                    {{-- Messaggio  --}}
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @elseif(old('title'))
                    <div class="valid-feedback">
                        Nice work dude!
                    </div>
                    @enderror



                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Price</label>
                    <input type="number" step=".01" class="form-control @error('price') is-invalid @elseif(old('price')) is-valid @enderror" name="price" value="{{ $errors->has('price') ? '' : old('price') }}">
                    {{-- Messaggio  --}}
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @elseif(old('price'))
                    <div class="valid-feedback">
                        Nice work dude!
                    </div>
                    @enderror

                </div>
                <div class="col-12">
                    <label for="" class="form-label">Sale date</label>
                    <input type="text" class="form-control @error('sale_date') is-invalid @elseif(old('sale_date')) is-valid @enderror" name="sale_date" value="{{ $errors->has('sale_date') ? '' : old('sale_date') }}" id="" placeholder="Date" name="sale_date" value="{{ $errors->has('sale_date') ? '' : old('sale_date') }}">

                    {{-- Messaggio  --}}
                    @error('sale_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @elseif(old('sale_date'))
                    <div class="valid-feedback">
                        Nice work dude!
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Description</label>
                    <textarea type="text" cols="30" rows="5" class="form-control  @error('description') is-invalid @enderror" placeholder="Description" name="description">{{ old('description') }}</textarea>
                    
                    {{-- Messaggio  --}}
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @elseif(old('description'))
                    <div class="valid-feedback">
                        Nice work dude!
                    </div>
                    @enderror

                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="series" id="flexCheckDefault" 
                            {{ old('series', 1) ? 'checked' : '' }} value="1">
                            <label class="form-check-label" for="flexCheckDefault">
                                Series?
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