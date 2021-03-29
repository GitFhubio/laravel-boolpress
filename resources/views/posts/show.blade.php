
@extends('layouts.app')
@section('content')
{{-- <a class="btn btn-primary" href="{{route('comments.create')}}">Crea</a> --}}
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Comment_Body</th>
        <th scope="col">Comment_Likes</th>
        <th scope="col">Back_To_Post</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($post->comments as $comment)
        <tr>
            <th scope="row">{{$comment->id}}</th>
            <td> {{$comment->body}}</td>
            <td> {{$comment->likes}}</td>
            <td><a class="btn btn-primary" href="{{route('posts.index')}}">Back to post</a></td>
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection
