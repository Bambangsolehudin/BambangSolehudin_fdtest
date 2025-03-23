<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // Filter berdasarkan penulis
        if ($request->has('author') && !empty($request->author)) {
            $query->where('author', 'like', '%' . $request->author . '%');
        }

        // Filter berdasarkan tanggal upload
        if ($request->has('date_uploaded') && !empty($request->date_uploaded)) {
            $query->whereDate('created_at', $request->date_uploaded);
        }

        // Filter berdasarkan rating
        if ($request->has('rating') && !empty($request->rating)) {
            $query->where('rating', $request->rating);
        }

        // Ambil data dengan pagination
        $books = $query->latest()->paginate(5);

        return view('landing', compact('books'));
    }
}
