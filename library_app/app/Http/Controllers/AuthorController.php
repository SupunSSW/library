<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\AuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        return view('authors.index')->with('authors', Author::all());
    }

    public function create() {
        return view('authors.create');
    }

    public function store(AuthorRequest $request) {

        Author::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
        ]);

        session()->flash('success', 'Author Created!');

        return redirect(route('authors.index'));
    }

    public function edit(Author $author) {
        return view('authors.create')->with('author', $author);
    }

    public function update(UpdateAuthorRequest $request, Author $author) {

        $author->update([
            'fname' => $request->fname,
            'lname' => $request->lname
        ]);

        session()->flash('success', 'Author Updated!');

        return redirect( route('authors.index') );
    }

    public function show($id) {
        // return view('show')->with('books', Book::where('author_id',$id)->cursor());
        return view('authors.show')->with('author', Author::find($id));
    }
}
