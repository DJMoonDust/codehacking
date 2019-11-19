@extends('layouts.admin')

@section('styles')

    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop

@section('content')

    <h1>Upload Media</h1>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'class'=>'dropzone']) !!}

        {!! Form::close() !!}

    </div>

    <div class="col-lg-7 mt-1">
        <a class="col-sm-2 btn btn-success btn-lg" href={{route("admin.media.index")}}>Done</a>
    </div>

@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop