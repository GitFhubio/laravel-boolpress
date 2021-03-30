@extends('layouts.app')
@section('content')
{{-- @php
$selected = $post->tags->search(function($item,$key) use ($tag){
    return $item->id==$tag->id;
})
@endphp --}}
<form action="{{route('posts.update',compact('post'))}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="author_id">Autori</label>
    <select name="author_id" id="">
        @foreach ($authors as $author)
        <option value="{{$author->id}}" {{$author->id==$post->author->id ? 'selected=selected' : ""}}>{{$author->name}}{{$author->surname}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="title">Titolo</label>
<input type="text" name="title" value="{{$post->title}} ">
</div>

<div class="form-group">
<label for="tags[]">Tags</label>
<select name="tags[]" multiple>
@foreach ($tags as $tag)
<option value="{{$tag->id}}" {{count($post->tags->where('id',$tag->id))>0
? 'selected=selected' : ""}}>{{$tag->name}}</option>
@endforeach
</select>
</div>
{{-- ha lo stesso nome la select del metodo author() --}}
{{-- se voglio farlo funzionare devo mettere author_id --}}

<textarea class="form-control" name="body" cols="30" rows="10" >{{ $post->body }} </textarea>
<button type="submit">Invia</button>
</form>
@endsection
