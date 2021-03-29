
@extends('layouts.app')
@section('content')
<div style="padding:20px;" class="post d-flex flex-column">
<h1>Post-title: {{$post->title}}</h1>
<p>{{$post->body}}</p>
<a class="btn btn-primary" href="{{route('posts.index')}}">Back to posts</a>
</div>
{{-- <a class="btn btn-primary" href="{{route('comments.create')}}">Crea</a> --}}
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Comments</th>
        <th scope="col">Likes</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($post->comments as $comment)
        <tr>
            <th scope="row">{{$comment->id}}</th>
            <td> {{$comment->body}}</td>
            <td> {{$comment->likes}}</td>
          </tr>
        @endforeach

    </tbody>
  </table>
  <form action="/api/fakecomments/{{$post->id}}" method="POST">
    @csrf
    @method('POST')
    <textarea name="body" id="" cols="30" rows="10"></textarea>
    <button type="submit">Invia Commento</button>
</form>
@endsection
