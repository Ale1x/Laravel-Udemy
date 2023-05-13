<?php

use App\Http\Controllers\AppController;
use App\Models\{Photo, User, Album};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/users', function() {
   return User::with('albums')
       ->paginate(5);
});

Route::get('/photos', function() {
   return Photo::all();
});


Route::get('/', [AppController::class, 'staff']);

Route::resource('albums', AlbumsController::class);
