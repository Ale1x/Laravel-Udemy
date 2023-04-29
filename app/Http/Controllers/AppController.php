<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{

    public function staff() {
        return view('prova.blade');
    }
}
