@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📚 Google Books Search</h2>

    <form action="{{ route('google.books.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search for books..." value="{{ $query ?? '' }}" required>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    @isset($books)
        <div class="row">
            @forelse($books as $book)
                @php
                    $info = $book['volumeInfo'];
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $info['imageLinks']['thumbnail'] ?? 'https://via.placeholder.com/128x200?text=No+Image' }}" class="card-img-top" alt="Cover Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $info['title'] ?? 'No title' }}</h5>
                            <p class="card-text">Author(s): {{ implode(', ', $info['authors'] ?? ['Unknown']) }}</p>
                            <a href="{{ $info['infoLink'] ?? '#' }}" target="_blank" class="btn btn-sm btn-outline-primary">View on Google</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No books found for "{{ $query }}".</p>
            @endforelse
        </div>
    @endisset
</div>
@endsection
