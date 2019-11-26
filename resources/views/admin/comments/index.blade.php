@extends('layouts.admin')

@section('content')



    @if(count($comments) > 0)

        <h1>Comments</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>Link</th>
                    <th>Replies</th>
                    <th>Status</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>

            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{ route('home.post', $comment->post->id) }}">View Post</a></td>
                    <td><a href="{{route('admin.comments.replies.show', $comment->id)}}">View Replies</a></td>
                    <td class="col-sm-1">
                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Approved', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Un-approved', ['class'=>'btn btn-warning']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>

    @else

        <h1>No Comments</h1>

    @endif

@Stop