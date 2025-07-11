@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Book</h2>

    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach(App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Availability</label>
            <select name="available" class="form-select">
                <option value="1" selected>Available</option>
                <option value="0">Out of Stock</option>
            </select>
        </div>

        {{-- Uncomment if using file upload later
        <div class="mb-3">
            <label class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
        </div>
        --}}

        <button type="submit" class="btn btn-primary">Create Book</button>
    </form>
</div>
@endsection
