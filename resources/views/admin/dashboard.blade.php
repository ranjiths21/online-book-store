@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="mb-3">
        <a href="{{ route('admin.books.create') }}" class="btn btn-success">➕ Add New Book</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price (₹)</th>
                    <th>Available</th>
                    <th>Category</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Book::all() as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ number_format($book->price, 2) }}</td>
                        <td>{{ $book->available ? 'Yes' : 'No' }}</td>
                        <td>{{ $book->category->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this book?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if(App\Models\Book::count() === 0)
                    <tr><td colspan="6" class="text-center">No books available.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
