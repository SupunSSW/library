@extends('layouts.app')

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
        <h3>Author : {{ $author->fname }} {{ $author->lname }}</h3>
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
                </thead>
                <tbody>
                    @foreach ( $author->book as $book)
                        <tr>
                            <td>{{$book->title}}</td>
                            <td>{{$book->isbn}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
