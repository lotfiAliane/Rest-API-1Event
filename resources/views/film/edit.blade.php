@extends('template')
@section('content')
@if(session()->has('msg'))
        <div class="notification is-success">
            {{ session('msg') }}
        </div>
    @endif
<div class="container">
    <div class="row card text-white bg-dark">
        <h4 class="card-header">Envoi d'une photo</h4>
        <div class="card-body">
  <form class="" action="{{route('films.update',$film->id)}}" method="POST">
    @csrf
                    @method('put')
      <div class="form-group">
          <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title"
          id="title" placeholder="title of film" value="{{old ('title',$film->title) }}">
          @error('title')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <input type="text" class="form-control  @error('year') is-invalid @enderror" name="year"
          id="number" placeholder="title of film" value="{{ $film->year }}">
          @error('year')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <input type="text" class="form-control  @error('description') is-invalid @enderror" name="description"
          id="number" placeholder="title of film" value="{{ $film->description }}">
          @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
  <button type="submit" class="btn btn-secondary">Envoyer !</button>
</form>
</div>
</div>
</div>
@endsection
