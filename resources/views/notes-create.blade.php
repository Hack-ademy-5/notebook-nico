@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <form method="POST" action="{{route('notes.store')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Texto de la nota</label>
                  <textarea name="text" id="" cols="30" rows="10" class="form-control"></textarea>
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
              </form>
        </div>
    </div>
@endsection