@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_image'))

        <p class="alert alert-success"> {{ session('deleted_image') }} </p>

    @endif

    @if(Session::has('deleted_images'))

        <p class="alert alert-success"> {{ session('deleted_images') }} </p>

    @endif

    <h1>Media</h1>

    @if($photos)

        <form action="{{ route('media.destroy') }}" method="POST" class="form-inline">
            {{csrf_field()}}

            <div class="form-group">
                <select name="checkboxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="form-control">
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="options"></th>
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
                            <td><input class="checkboxes" type="checkbox" name="checkboxArray[]" value="{{$photo->id}}"></td>
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

                                <input type="hidden" name="photo" value="{{$photo->id}}">

                                <div class="form-group">
                                    <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    @endif

    <div class="row">
        <a class="col-sm-2 btn btn-primary btn-lg" href={{route("admin.media.create")}}>Upload Media</a>
    </div>

@stop


@section('scripts')

    <script>

        $(document).ready(function(){

            $('#options').click(function(){

                if (this.checked){

                    $('.checkboxes').each(function(){

                        this.checked = true;
                    });

                } else {

                    $('.checkboxes').each(function(){

                        this.checked = false;
                    });

                }

            });

        });

    </script>

@stop