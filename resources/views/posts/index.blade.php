@extends('layouts.app')
@section('content')
{{-- <img src="{{asset('storage/KmaazrWhjkSC1cpT3Icf7sohIRUF0483jY3tvyuA.jpg')}}" alt=""> --}}
<form action="{{route('posts.index')}}" method="GET">
<input style="width:300px;" type="text" name="search" placeholder="Search post by title,body,author or tag">
<button type="submit">Search post</button>
</form>
<a class="btn btn-primary" href="{{route('posts.create')}}">Crea un nuovo post</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Author</th>
        <th scope="col">Tags</th>
        <th scope="col">img</th>
        <th scope="col">Show</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->author->name}} {{$post->author->surname}}</td>
            <td> @foreach ($post->tags as $tag)
            {{$tag->name}}
            @endforeach</td>
            @if($post->img!= null)
            <td><img style="width:80px;height:auto;" src="{{asset($post->img)}}" alt=""></td>
            @endif
           <td><a class="btn btn-primary" href="{{route('posts.show',compact('post'))}}">Show Comments</a>
           <a class="btn btn-success" href="{{route('posts.edit',compact('post'))}}">Edit post</a>
            <form action="{{route('posts.destroy',compact('post'))}}" method="POST">
                @csrf
                @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button></form>
            </td>
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection
