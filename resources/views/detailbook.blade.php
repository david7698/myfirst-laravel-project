@extends('layouts.template')


@section('title',$book['title']. ' '.$book['page_number'].' pagine')

@section('content')

<img src="{{Storage::url($book['image']) ;}}" alt="" style="width:250px;">

<div class="row">

{{$book->description}} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus sunt distinctio ipsum. Animi suscipit commodi est delectus repellat eos, sapiente unde expedita fugit quia omnis veniam voluptate eius, nesciunt tempore!
</div>
<div class="container">
<h1>commenti</h1>
@foreach($comments as $comment)

    <div class="row" style="border: 1px black solid; margin-bottom:10px;">
    <div class="col-11">
    {{ $comment->comment }}
    </div>
    <div class="col-1">
    {{ $comment->created_at }}
    </div>
    </div>
@endforeach
<form action="{{ route('book.comment',[ 'bookId' => $book['id'] ]) }}" method="POST" id="commentForm">
@csrf
<textarea  form="commentForm" name="text" id="text" cols="30" rows="10"></textarea>
<button class="btn btn-info" type="submit">commenta</button>
</form>
</div>







@endsection
