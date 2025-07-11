@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Book: {{ $book->title }}</h2>

    <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" class="form-control">{{ $book->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ $book->price }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach(App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Availability</label>
            <select name="available" class="form-select">
                <option value="1" {{ $book->available ? 'selected' : '' }}>Available</option>
                <option value="0" {{ !$book->available ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
