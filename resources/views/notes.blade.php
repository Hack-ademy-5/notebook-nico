@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Todas las notas</h1>
        </div>
    </div>
    <div class="row">
        @include('layouts._notes')
    </div>
@endsection