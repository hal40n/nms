<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ImageUploadController;

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
    return view('welcome');
});

Route::get('/', [ProcedureController::class, 'index'])->name('procedures.index');
Route::resource('procedures', ProcedureController::class);
Route::resource('procedures.pages', PageController::class);
Route::post('/upload_image', [ImageUploadController::class, 'store'])->name('upload_image');
