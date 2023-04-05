@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div> 
@endif
<div class="container">
    <div class="row">
        <h3>
            Welcome {{ Auth::user()->name }}
        </h3>
        <a href="/blog/create">
            <i class="fa fa-sharp fa-solid fa-plus"></i> blog
        </a>   
    </div>

    <div class="row">
        <div id="blogs">
            <br>
            <input class="search form-control" placeholder="Search by title"
                style="height: calc(1.5em + .75rem + 2px); width: 250px;" />
                <br>
            <table class="table table-responsive table-bordered">
                <thead>
                    <th>
                        ID #
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>
                <tbody class="list" style="align-text:center;">
                    @foreach ($blogs as $blog)
                    <tr>
                        <td>
                            {{ $blog->id }}
                        </td>

                        <td class="title">
                            <a href="/blog/view/{{ $blog->id }}" title="{{ $blog->body }}">
                                {{ $blog->title }}
                            </a>
                        </td>
                    
                        <td>
                            <img src="{{ $blog->image }}" title="{{ $blog->title }} image" style="width: 250px; height: 100%; obect-fit: cover;">
                        </td>
                        
                        <td>
                            <a href="/blog/edit/{{ $blog->id }}" title="Edit {{ $blog->title }}">
                                <i class="fa fa-sharp fa-solid fa-edit"></i>
                            </a>
                        </td>
                        
                        <td>
                            <a href="/blog/delete/{{ $blog->id }}" title="Delete {{ $blog->title }}">
                                <i class="fa fa-sharp fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $blogs->links() }}
    </div>
</div>
@endsection
