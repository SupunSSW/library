@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header">
        <h3>{{ isset($author) ? 'Edit Author' : 'New Author'}}</h3>
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

            <form action="{{ isset($author) ? route('authors.update', $author->id) : route('authors.store') }}" method="POST">
                @csrf

                @if( isset( $author ) )
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="fname">First Name</label>
                <input id="fname" type="text" class="form-control" name="fname" value="{{ isset($author) ? $author->fname : '' }}">
                    <label for="lname">Last Name</label>
                <input id="lname" type="text" class="form-control" name="lname" value="{{ isset($author) ? $author->lname : ''}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">{{ isset($author) ? 'Update Author' : 'Create Author' }}</button>
                </div>
            </form>

        </div>
    </div>
@endsection
