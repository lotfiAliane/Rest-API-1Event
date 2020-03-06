@extends('template')
@section('content')
<div class="card">
  <a class="button is-warning" href="{{route('films.create')}}">Add</a>
        <header class="card-header">
            <p class="card-header-title">Films</p>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
      <thead>

        <tr>
          <th>#</th>
          <th>Title</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      @foreach($films as $film)
        <tr>

          <td>{{$film->id}}</td>
          <td>{{$film->title}}</td>
          <td>{{$film->category->name}}</td>

          <td><a class="button is-warning" href="{{route('films.edit',$film->id)}}">Modifier</a></td>
          <td><form action="{{route('films.destroy',$film->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="button is-danger">Supprimer</a></td>
          </form>
        </tr>
      @endforeach
            </tbody>

          </table>

                      <footer class="card-footer is-centered">
                                  {{ $films->links() }}
                              </footer>
    </div>
</div>
</div>
@endsection
