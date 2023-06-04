@extends('templates.default')
@section('title', 'Albums')
@section('pageTitle', 'Albums')
@section('body')
    <form>
        @csrf
        @if(session()->has('message'))
            <x-alert-info type="{{ session('alertType') }}">
                {{ session('message') }}
            </x-alert-info>
        @endif

        <a href="{{route('albums.create')}}" class="btn btn-success mb-3">Add New Album</a>

        <ul class="list-group">
            @foreach($albums as $album)

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $album->id }} -- {{ $album->album_name }}</span>
                    @if($album->album_thumb)
                        <div class="mb-4">
                            <img width="300" height="150" src="{{$album->album_thumb}}" alt="{{$album->album_name}}" title="{{$album->album_name}}">
                        </div>
                    @endif
                    <div>
                        <a href="{{route('albums.edit',
                        ['album' => $album->id])}}"
                           class="btn btn-primary">Update</a>
                        <a href="/albums/{{$album->id}}" class="btn btn-danger">Delete</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </form>
@endsection

@section('footer_js')
    @parent
    <script>
        $(document).ready(function() {
            $('div.alert').fadeOut(5000);
            $('ul').on('click', 'a.btn-danger', function(ele) {
                ele.preventDefault();

                var urlAlbum = $(this).attr('href');
                var li = ele.target.parentNode.parentNode;
                $.ajax(urlAlbum,
                    {
                        method: 'DELETE',
                        data : {
                            _token : $('#_token').val()
                        },
                        complete : function (resp) {
                            if(resp.responseText == 1) {
                                li.parentNode.removeChild(li);
                                // $(li).remove();
                            }else {
                                alert('Problemi nel Database!');
                            }
                        }
                    })
            });
        });
    </script>
@endsection
