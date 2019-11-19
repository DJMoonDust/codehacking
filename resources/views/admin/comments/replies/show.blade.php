@extends('layouts.admin')

@section('content')



    @if(count($replies) > 0)

        <h1>Replies</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Link</th>
                <th>Status</th>
                <th>Remove</th>
            </tr>
            </thead>
            <tbody>

            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{ route('home.post', $reply->comment->post->id) }}">View Post</a></td>
                    <td class="col-sm-1">
                        @if($reply->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Approved', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Un-approved', ['class'=>'btn btn-warning']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $reply->id]]) !!}

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

        <h1>No Replies</h1>

    @endif

@Stop