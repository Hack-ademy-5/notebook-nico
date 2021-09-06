<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class,'home'])->name('home');

// ruta para enseñar el formulario
Route::get('notes-create',[NoteController::class,'create'])->name('notes.create');
// gestionar los datos recibidos
Route::post('notes',[NoteController::class,'store'])->name('notes.store');

// leer todas las notas
Route::get('notes',[NoteController::class,'index'])->name('notes.index');