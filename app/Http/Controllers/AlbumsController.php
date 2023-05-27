<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $queryBuilder = Album::orderBy('id', 'DESC');

        if($request->has('id')) {
            $queryBuilder->where('id', $request->input('id'));
        }

        if($request->has('album_name')) {
            $queryBuilder->where('album_name', 'LIKE', $request->input('album_name').'%');
        }

        $albums = $queryBuilder->get();
        return view('albums.albums', ['albums' => $albums]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.createalbum');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['album_name', 'description']);
        $data['user_id'] = 1;
        $data['album_thumb'] = '';

        $queryBuilder =  Album::insert($data);

        if ($queryBuilder) {
            session()->flash('message', 'Aggiornamento riuscito!');
            session()->flash('alertType', 'primary');
        } else {
            session()->flash('message', 'Aggiornamento fallito!');
            session()->flash('alertType', 'danger');
        }

        return redirect()->route('albums.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {

        return $album;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.editalbum')->withAlbum($album);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $data = $request->only(['album_name', 'description']);

        $response = $album->update($data);


        if ($response) {
            session()->flash('message', 'Aggiornamento riuscito!');
            session()->flash('alertType', 'primary');
        } else {
            session()->flash('message', 'Aggiornamento fallito!');
            session()->flash('alertType', 'danger');
        }

        return redirect()->route('albums.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //Album::findOrFail($id)->delete();
        // Album::destroy($album->id)

        return +$album->delete();

    }


}
