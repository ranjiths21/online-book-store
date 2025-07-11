<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoogleBookController extends Controller
{
    public function index()
    {
        return view('google_books.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->route('google.books')->with('error', 'Please enter a search term.');
        }

        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $query,
            'maxResults' => 10,
        ]);

        $books = $response->json()['items'] ?? [];

        return view('google_books.index', compact('books', 'query'));
    }
}
