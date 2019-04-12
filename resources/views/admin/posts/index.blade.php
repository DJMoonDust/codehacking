@extends('layouts.admin')

@section('content')

    @if(Session::has('created_post'))

        <p class="alert alert-success"> {{ session('created_post') }} </p>

    @endif

    @if(Session::has('updated_post'))

        <p class="alert alert-success"> {{ session('updated_post') }} </p>

    @endif

    @if(Session::has('deleted_post'))

        <p class="alert alert-danger"> {{ session('deleted_post') }} </p>

    @endif

    <h1>Posts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{route('admin.users.edit', $post->user->id)}}">{{ $post->user->name }}</a></td>
                        <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                        <td><img height="50px" src="{{ $post->photo ? $post->photo->file : '/images/placeholder3.jpg' }}"></td>
                        <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ str_limit($post->body, 35) }}</td>
                        <td>{{ $post->created_at->diffForhumans() }}</td>
                        <td>{{ $post->updated_at->diffForhumans() }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="row">
        <a href={{route("admin.posts.create")}} class="col-sm-2 btn btn-info btn-lg" >+ Add Post</a>
    </div>

@stop