{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/blog/edit/{{ $blog->id }}" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <label>Title:</label><br>
                <input type="text" name="title" value="{{ $blog->title }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Body:</label><br>
                <textarea name="body" class="form-control" required>{{ $blog->body }}</textarea>
            </div>
            <div class="col-md-6">
                <label>Image:</label><br>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Edit" class="btn btn-primary" style="float:right;">
            </div>
        </div>
    </div>
</form> 

@endsection
