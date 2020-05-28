@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header">
        <h3>{{ isset( $book ) ? 'Edit Book' : 'New Book' }}</h3>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}" method="POST">
                @csrf

                @if(isset($book))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ isset($book) ? $book->title : '' }}">
                    <label for="isbn">ISBN</label>
                    <input id="isbn" type="text" class="form-control" name="isbn" value="{{ isset($book) ? $book->isbn : '' }}">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <select name="author" id="author" class="form-control">
                        @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->fname }} {{ $author->lname }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                <button class="btn btn-success">{{ isset($book) ? 'Update Book' : 'Create Book' }}</button>
                </div>
            </form>

        </div>
    </div>
@endsection
