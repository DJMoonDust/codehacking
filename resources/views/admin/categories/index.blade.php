@extends('layouts.admin')

@section('content')

    @if(Session::has('created_category'))

        <p class="alert alert-success"> {{ session('created_category') }} </p>

    @endif

    @if(Session::has('updated_category'))

        <p class="alert alert-success"> {{ session('updated_category') }} </p>

    @endif

    @if(Session::has('deleted_category'))

        <p class="alert alert-danger"> {{ session('deleted_category') }} </p>

    @endif

    <h1>Categories</h1>

    <div class="col-sm-4">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    <div class="col-sm-6">

        @if($categories)
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</td>
                        <td>{{ $category->created_at ? $category->created_at->diffForHumans() : 'no date' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>



@stop