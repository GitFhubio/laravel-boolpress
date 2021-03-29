@extends('layouts.app')
@section('content')
@foreach ($post->comments as $comment)
{{$comment->body}}
@endforeach


@endsection
