@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Detalle de la nota</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
            <p>{{$note->text}}</p>
            <h5>Creada el: {{$note->created_at}}</h5>
            <a href="{{route('notes.edit',['id'=>$note->id])}}" class="btn btn-warning">Edit</a>
            <form action="{{route('notes.destroy',['id'=>$note->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection