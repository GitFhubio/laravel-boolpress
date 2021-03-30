@extends('layouts.app')
@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Author</th>
        <th scope="col">Tags</th>
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
           <td><a class="btn btn-primary" href="{{route('posts.show',compact('post'))}}">Show Comments</a></td>
           <td><a class="btn btn-success" href="{{route('posts.edit',compact('post'))}}">Edit post</a></td>
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection
