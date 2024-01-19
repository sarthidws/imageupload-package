<?php

use Illuminate\Support\Facades\Route;
use Dwsproduct\ImageUpload\Http\Controllers\ImageUploadController;

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

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::controller(ImageUploadController::class)
    ->as('image.')
    ->group(function () {
        Route::post('imagte-upload', 'postImages')->name('postImages');
    });
