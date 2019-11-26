@extends('layouts.blog-home')

@section('content')

    {{--<h1 class="page-header">--}}
        {{--Page Heading--}}
        {{--<small>Secondary Text</small>--}}
    {{--</h1>--}}

    <!-- First Blog Post -->

    @if('posts')
        @foreach($posts as $post)

            <h2>
                <a href="/post/{{$post->slug}}">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by {{$post->user->name}}
            </p>
            <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>
            <hr>
            <a href="/post/{{$post->slug}}"><img class="img-responsive"  src="http://codehacking.test/images/placeholder3.jpg" alt=""></a>
            <hr>
            <p>{{str_limit($post->body, 300)}}</p>
            <a class="btn btn-primary" href="/post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

        @endforeach
    @endif


    <!-- Pagination -->

    <div class="row">

        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}

        </div>

    </div>

@endsection
