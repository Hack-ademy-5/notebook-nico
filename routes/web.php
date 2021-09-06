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

// CREATE
// ruta para enseñar el formulario
Route::get('notes-create',[NoteController::class,'create'])->name('notes.create');
// gestionar los datos recibidos
Route::post('notes',[NoteController::class,'store'])->name('notes.store');

// READ
// read all
// leer todas las notas
Route::get('notes',[NoteController::class,'index'])->name('notes.index');
// read one
// leer una nota
Route::get('notes/{id}',[NoteController::class,'show'])->name('notes.show');

// UPDATE
// ruta para enseñar el formulario de modificación
Route::get('notes-edit/{id}',[NoteController::class,'edit'])->name('notes.edit');
// ruta para gestionar los datos recibidos
Route::put('notes/{id}',[NoteController::class,'update'])->name('notes.update');

// DELETE
Route::delete('notes/{id}',[NoteController::class,'destroy'])->name('notes.destroy');
