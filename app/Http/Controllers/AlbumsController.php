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
        return view('albums', ['albums' => $albums]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //
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
