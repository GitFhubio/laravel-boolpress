{{-- @foreach ($comments as $comment)
 {{$comment->body}}
{{$comment->post->title}}
 {{$comment->likes}}
@endforeach --}}
@extends('layouts.app')
@section('content')
{{-- <a class="btn btn-primary" href="{{route('comments.create')}}">Crea</a> --}}
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Post_title</th>
        <th scope="col">Comment_Body</th>
        <th scope="col">Comment_Likes</th>
        <th scope="col">Show_Post</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <th scope="row">{{$comment->id}}</th>
            <td>{{$comment->post->title}}</td>
            <td> {{$comment->body}}</td>
            <td> {{$comment->likes}}</td>
            <td><a class="btn btn-primary" href="{{route('posts.show',['post'=>$comment->post])}}">Original Post</a></td>
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection
