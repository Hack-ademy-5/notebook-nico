@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Notebook, para que no te pierdas nada</h1>
            <h2>Las ultimas notas</h2>
        </div>
    </div>
    <div class="row">
        @include('layouts._notes')
    </div>
@endsection