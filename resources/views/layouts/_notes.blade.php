@foreach ($notes as $note)
<div class="col-12 col-md-4">
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{$note->text}}</p>
            <a href="{{route('notes.show',['id'=>$note->id])}}" class="btn btn-primary">Detail</a>
        </div>
    </div>
</div>
@endforeach
