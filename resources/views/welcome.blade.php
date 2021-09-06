@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Notebook, para que no te pierdas nada</h1>
            <h2>Las ultimas notas</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($notes as $note)
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                      <p class="card-text">{{$note->text}}</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
@endsection