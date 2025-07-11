<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function home()
    {
        $books = Book::latest()->take(5)->get();
        $weather = Http::get('https://wttr.in/?format=3')->body();
        return view('home', compact('books', 'weather'));
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ]);

        Book::create($request->all());

        return redirect()->route('admin.books.index');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        return redirect()->route('admin.books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return back();
    }
}
