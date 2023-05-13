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
        $sql = "SELECT * FROM albums";
        $where = ' ';

        if($request->has('id')) {
            $where .= "id=" . (int)$request->get('id');
        }

        if($request->has('album_name')) {
            $where .= " AND album_name='" . (string)$request->get('album_name')."'";
        }

        $sql .= " WHERE" . $where;
        //dd($sql);


        return DB::select($sql);
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
    public function destroy(Album $album)
    {
        //
    }
}
