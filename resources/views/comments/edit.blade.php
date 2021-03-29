@extends('layouts.app')
@section('content')
<form action="{{route('comments.store')}}" method="post">
    @csrf
    @method('POST')
<input type="textarea">
<button type="submit">Invia</button>
</form>
@endsection
