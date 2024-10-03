<?php

use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('songs', SongController::class);

Route::get('/songs',
    [SongController::class, 'index'])->name('songs.index');

Route::get('/songs/create',
    [SongController::class, 'create'])->name('songs.create');

Route::get('/songs/{song}',
    [SongController::class, 'show'])->name('songs.show');

Route::get('/songs/{song}/edit',
    [SongController::class, 'edit'])->name('songs.edit');


