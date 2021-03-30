@extends('layouts.app')
@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Email</th>
        <th scope="col">Bio</th>
        <th scope="col">Pic</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($authors as $author)
        <tr>
            <th scope="row">{{$author->id}}</th>
            <td>{{$author->name}}</td>
            <td>{{$author->surname}}</td>
            <td>{{$author->email}}</td>
            <td>{{$author->datail->bio}}</td>
            <td>{{$author->detail}}</td>
           <td><a class="btn btn-primary" href="{{route('authors.show',compact('author'))}}">Show Author</a></td>
           <td><a class="btn btn-success" href="{{route('authors.edit',compact('author'))}}">Edit author</a></td>
           <td>
            <form action="{{route('authors.destroy',compact('author'))}}" method="POST">
                @csrf
                @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button></form>
            </td>
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection
