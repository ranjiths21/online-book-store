@extends('layouts.app')

@section('content')
<h1>Welcome to Online Book Store</h1>
<p>{{ $weather }}</p>

<h2>Latest Books</h2>
@foreach($books as $book)
    <div>
        <h3><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></h3>
        <p>{{ $book->author }}</p>
        <p>₹{{ $book->price }}</p>
    </div>
   

@endforeach
@endsection
