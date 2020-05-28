@extends('layouts.app')

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('books.create') }}" class="btn btn-primary float-right">+ New Book</a>
            <h3>Books</h3>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->author_id }}</td>
                            <td><a href="{{ route('books.edit', $book->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
