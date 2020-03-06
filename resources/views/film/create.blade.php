@extends('template')
@section('content')
<br>
  <div class="container">
      <div class="row card text-white bg-dark">
          <h4 class="card-header">Ajouter un film</h4>
          <div class="card-body">
              <form action="{{ route('films.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                      @error('title')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <input type="number" class="form-control  @error('yeayr') is-invalid @enderror" name="year" id="year" placeholder="Year" value="{{ old('year') }}">
                      @error('year')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" placeholder="description">{{ old('description') }}</textarea>
                      @error('description')
                          <div class="invalid-feedback">{{ $description }}</div>
                      @enderror
                  </div>
                  <button type="submit" class="btn btn-secondary">Envoyer !</button>
              </form>
          </div>
      </div>
  </div>

@endsection
