@extends('layouts.app')
@section('content')

<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="author_id">Autori</label>
    <select name="author_id" id="">
        @foreach ($authors as $author)
        <option value="{{$author->id}}">{{$author->name}}{{$author->surname}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="title">Titolo</label>
<input type="text" name="title">
</div>

<div class="form group">
<label for="image">Image</label>
<input type="file" name="image" class="form-control" id="image">
</div>
<div class="form-group">
<label for="tags[]">Tags</label>
<select name="tags[]" multiple>
@foreach ($tags as $tag)
<option value="{{$tag->id}}">{{$tag->name}}</option>
@endforeach
</select>
</div>
{{-- ha lo stesso nome la select del metodo author() --}}
{{-- se voglio farlo funzionare devo mettere author_id --}}

<textarea class="form-control" name="body" cols="30" rows="10" placeholder="Inserisci il tuo post"></textarea>
<button type="submit">Invia</button>
</form>
@endsection

{{-- creiamo select per selezionare author --}}
