@extends('layouts.app')

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
        <a href="{{ route('authors.create') }}" class="btn btn-primary float-right">+ New Author</a>
            <h3>Authors</h3>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <td>{{$author->fname}}</td>
                            <td>{{$author->lname}}</td>
                        <td>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <button onclick="deleteitem({{ $author->id }})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
