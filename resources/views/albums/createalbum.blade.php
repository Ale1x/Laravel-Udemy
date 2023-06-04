@extends('templates.default')
@section('title', 'Create Album')
@section('pageTitle', 'Create Album')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-5">
                    <div class="card-body">
                        <form method="post" action="{{route('albums.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="name">Name</label>
                                <input required class="form-control" name="album_name" id="album_name" placeholder="Enter album name">
                            </div>

                            <div class="form-group mb-4">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="album_thumb">Album Thumb</label>
                                <input type="file" required class="form-control" name="album_thumb" id="album_thumb" placeholder="Enter Album Thumb URL">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
