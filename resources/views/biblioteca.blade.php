@extends('layouts.template')


@section('title','biblioteca2')


@section('content')

<a class="btn btn-dark" href="{{ route('book.create') }}" >crea libro</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">titolo</th>
      <th scope="col">descrizione</th>
      <th scope="col">pagine</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

@foreach($books as $book)

    <tr>
      <td>{{ $book->id }}</td>
      <td>{{ $book->title }}</td>
      <td>{{ $book->description }}</td>
      <td>{{ $book->page_number }}</td>
      <td><a class="text-light btn btn-warning" href="{{ route('books.detail', [ 'bookId' => $book->id ])  }}">detail</a></td>
      <td><a class="text-light btn btn-danger" href="{{ route('books.delete', [ 'bookId' => $book->id ])  }}">delete</a></td>
      <td><a class="text-light btn btn-info" href="{{ route('book.edit', [ 'bookId' => $book->id ])  }}">update</a></td>
    </tr>
    
    @endforeach
    </table>



@endsection

