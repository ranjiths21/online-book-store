@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                @if($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="Cover Image">
                @endif

                <div class="card-body">
                    <h3 class="card-title">{{ $book->title }}</h3>
                    <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                    <p class="card-text"><strong>Price:</strong> ₹{{ number_format($book->price, 2) }}</p>
                    <p class="card-text"><strong>Availability:</strong> {{ $book->available ? 'In Stock' : 'Out of Stock' }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ $book->category->name ?? 'N/A' }}</p>
                    <hr>
                    <p>{{ $book->description }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">⬅️ Back to Book List</a>
            </div>
        </div>
    </div>
</div>
@endsection

