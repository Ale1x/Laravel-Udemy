@extends('templates.default')
@section('title', 'Edit Album')
@section('pageTitle', 'Edit Album')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-5">
                    <div class="card-body">
                        <form method="post" action="{{route('albums.update', ['album' => $album->id])}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="mb-4">
                                <label for="name">Name</label>
                                <input class="form-control" name="album_name" id="album_name" placeholder="Enter album name" value="{{$album->album_name}}">
                            </div>
                            @if($album->album_thumb)
                                <div class="mb-4">
                                    <img width="300" height="150" src="{{$album->album_thumb}}" alt="{{$album->album_name}}" title="{{$album->album_name}}">
                                </div>
                            @endif
                            <div class="mb-4">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3">{{$album->description}}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="album_thumb">Album Thumb</label>
                                <input type="file" class="form-control" name="album_thumb" id="album_thumb" placeholder="Enter Album Thumb URL">
                            </div>

                            <div class="">
                                <button class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
