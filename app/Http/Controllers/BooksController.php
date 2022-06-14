<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function list(Request $request) {
        $incoming = $request->get('incoming',1);
        return view('books', [
            'incoming' => $incoming
        ]);
    }

    public function index()
    {
        $books = Book::paginate(10);
        return view('admin.book', ['books' => $books]);
    }

    public function deleteBook($id)
    {
        $books = Book::findOrFail($id);

        $books->delete();

        return redirect()->route('admin.book');
    }

    public function updateBook($id)
    {
        $book = Book::findOrFail($id);

        return view('admin.updateBook', ['book' => $book]);
    }
    
    public function saveBook(Request $request)
    {
        $book = Book::findOrFail($request->id);

        $book->id_flight = $request->id_flight;
        $book->id_booker = $request->id_booker;
        $book->date = $request->date;
        $book->isPaid = $request->isPaid;
        $book->comment = $request->comment;
        $book->save();
        return redirect()->route('admin.book');
    }
}
