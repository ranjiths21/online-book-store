@extends('layouts.app')

@section('content')
<h1>All Books</h1>
@foreach($books as $book)
    <div>
        <h3><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></h3>
    </div>
@endforeach
@endsection
