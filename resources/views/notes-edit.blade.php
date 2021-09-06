@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Modifica la nota</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <form method="POST" action="{{route('notes.update',['id'=>$note->id])}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Texto de la nota</label>
                  <textarea name="text" id="" cols="30" rows="10" class="form-control">{{old('text') ?? $note->text}}</textarea>
                  @error('text')
                  <div style="color:red">{{$message}}</div>
                  @enderror
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
              </form>
        </div>
    </div>
@endsection