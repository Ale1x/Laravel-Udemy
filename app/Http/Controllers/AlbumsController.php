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
        //return Album::all();

        /*
         * RAW Query
         */
        $sql = "SELECT * FROM albums WHERE 1=1";
        $where = [];

        if($request->has('id')) {
            $where['id'] = $request->get('id');
            $sql .= " AND ID=?";
        }

        if($request->has('album_name')) {
            $where['album_name'] = $request->get('album_name');
            $sql .= " AND album_name=?";
        }
        $albums = DB::select($sql, array_values($where));
        return view('albums.albums', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
        $sql = "SELECT * FROM albums where ID=:id";
        return DB::select($sql, ['id' => $album->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        $sql = "SELECT * FROM albums WHERE ID=:id";
        $albumEdit = Db::select($sql, ['id' => $album->id]);

        return view('albums.editalbum')->withAlbum($albumEdit[0]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $album)
    {
        $data = $request->only(['album_name', 'description']);
        $data['id'] = $album;

        $sql = "UPDATE albums SET album_name=:album_name, description=:description WHERE id=:id";
        $res = DB::update($sql, $data);

        if ($res) {  // Se l'aggiornamento è andato a buon fine
            session()->flash('message', 'Aggiornamento riuscito!');
            session()->flash('alertType', 'primary');
        } else {  // Se l'aggiornamento non è andato a buon fine
            session()->flash('message', 'Aggiornamento fallito!');
            session()->flash('alertType', 'danger');
        }

        return redirect()->route('albums.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $sql = 'DELETE FROM albums WHERE id = :id';
        $result = Db::delete($sql, ['id' => $id]);

        return $result;
    }


    public function delete(int $id)
    {
        $sql = 'DELETE FROM albums WHERE id= :id';
        return Db::delete($sql, ['id' => $id]);

        //return redirect()->back();
    }
}
