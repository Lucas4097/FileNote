<?php

use App\Http\Controllers\NoteController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth'])->group( function(){

    Route::get('/dashboard', [NoteController::class, 'dashboardPage'])
        ->name('dashboard');

    Route::post('criar_anotacao',[NoteController::class, 'create'])
        ->name('create.note');

    Route::post('editar_anotacao',[NoteController::class, 'update'])
        ->name('update.note');

    Route::post('excluir_anotacao',[NoteController::class, 'delete'])
        ->name('delete.note');

});




require __DIR__.'/auth.php';
