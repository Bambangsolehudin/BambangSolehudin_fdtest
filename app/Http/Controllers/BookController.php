<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        $filePath = null;
        if ($request->hasFile('thumbnail')) {
            $filePath = $request->file('thumbnail')->store('books', 'public');
        }
    
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'thumbnail' => $filePath,
            'rating' => $request->rating,
        ]);
    
        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($book->thumbnail && file_exists(storage_path('app/public/' . $book->thumbnail))) {
                unlink(storage_path('app/public/' . $book->thumbnail));
            }

            // Simpan gambar baru ke storage
            $filePath = $request->file('thumbnail')->store('books', 'public');
            $book->thumbnail = $filePath;
        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->rating = $request->rating;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
