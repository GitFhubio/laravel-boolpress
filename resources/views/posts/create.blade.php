@extends('layouts.app')
@section('content')

<form action="{{route('posts.store')}}" method="post">
    @csrf
    @method('POST')
<input type="text" name="title">
{{-- ha lo stesso nome la select del metodo author() --}}
{{-- se voglio farlo funzionare devo mettere author_id --}}
<select name="author_id" id="">
    @foreach ($authors as $author)
    <option value="{{$author->id}}">{{$author->name}}{{$author->surname}}</option>
    @endforeach
</select>
<textarea class="form-control" name="body" id="" cols="30" rows="10" placeholder="Inserisci il tuo post"></textarea>
<button type="submit">Invia</button>
</form>
@endsection

{{-- creiamo select per selezionare author --}}
