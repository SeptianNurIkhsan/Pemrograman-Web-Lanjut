<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NilaiController;

Route::get('/nilai', [NilaiController::class, 'index']);
Route::post('/nilai/convert', [NilaiController::class, 'convert'])->name('convert');


Route::get('/', function () {
    return view('welcome');
});