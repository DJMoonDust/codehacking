@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_image'))

        <p class="alert alert-success"> {{ session('deleted_image') }} </p>

    @endif

    <h1>Media</h1>

    @if($photos)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Relation</th>
                    <th>User/Title</th>
                    <th>Created At</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photos as $photo)

                    <tr class="{{!$photo->user && !$photo->post ? 'warning' : ''}}">
                        <td>{{ $photo->id }}</td>
                        <td><img height="50px" src="{{ $photo->file }}" alt=""></td>
                        <td>{{ str_replace($photo->uploads, '', $photo->file) }}</td>
                        <td>
                            @if($photo->user)
                                User
                            @elseif($photo->post)
                                Post
                            @else
                                None
                            @endif
                        </td>
                        <td>
                            @if($photo->user)
                                <a href="{{ route('admin.users.edit', $photo->user->id) }}">{{ $photo->user->name }}</a>
                            @elseif($photo->post)
                                <a href="{{ route('admin.posts.edit', $photo->post->id) }}">{{ $photo->post->title }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'no date' }}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}

                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="row">
        <a class="col-sm-2 btn btn-primary btn-lg" href={{route("admin.media.create")}}>Upload Media</a>
    </div>

@stop