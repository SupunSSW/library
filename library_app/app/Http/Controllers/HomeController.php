<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('books.index')->with('books', Book::all())->with('authors', Author::all());
    }

    public function create() {
        return view('books.create')->with('authors', Author::all());
    }

    public function store(BookRequest $request) {

        Book::create([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'author_id' => $request->author
        ]);

        session()->flash('success', 'Book Added!');

        return redirect(route('home'));
    }

    public function edit(Book $book) {
        return view('books.create')->with('book', $book)->with('authors', Author::all());
    }

    public function update( UpdateBookRequest $request, Book $book) {
        $book->update([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'author_id' => $request->author
        ]);

        session()->flash('success', 'Book Updated!');

        return redirect(route('home'));
    }


}
