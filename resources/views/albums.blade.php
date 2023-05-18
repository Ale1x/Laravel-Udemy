@extends('templates.default')
@section('title', 'Albums')
@section('pageTitle', 'Albums')
@section('body')
    <form>
        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
        <ul class="list-group">
            @foreach($albums as $album)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $album->id }} -- {{ $album->album_name }}</span>
                    <a href="/albums/{{$album->id}}" class="btn btn-danger">Delete</a>
                </li>
            @endforeach
        </ul>
    </form>
@endsection

@section('footer_js')
    @parent
    <script>
        $(document).ready(function() {
            $('ul').on('click', 'a', function(ele) {
                ele.preventDefault();

                var urlAlbum = $(this).attr('href');
                var li = ele.target.parentNode;
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
