<?php

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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;

Route::get('/home', function () {
    return view('backend.index');
});

Route::get('register', [AuthController::class, 'showFormRegister'])->name('showFormRegister');
Route::post('register', [AuthController::class, 'createRegister'])->name('createRegister');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('showFormLogin');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('CheckAuth')->group(function (){
    Route::prefix('notes')->group(function (){
        Route::get('index', [NoteController::class,'index'])->name('note.index');
        Route::get('/{id}/detail',[NoteController::class, 'show'])->name('note.detail');
        Route::get('/create',[NoteController::class, 'create'])->name('note.create');
        Route::post('/create',[NoteController::class, 'store'])->name('note.store');
        Route::get('/{id}/edit',[NoteController::class, 'edit'])->name('note.edit');
        Route::post('{id}/update',[NoteController::class, 'update'])->name('note.update');
        Route::get('{id}/delete',[NoteController::class, 'destroy'])->name('note.delete');
    });
});
