<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/tasks')->group(function(){

    Route::get('/',[App\Http\Controllers\TasksController::class,'list'])
    ->name('task.all');

    Route::get('/create',[App\Http\Controllers\TasksController::class,'create'])
    ->name('task.create');

    Route::post('/create',[App\Http\Controllers\TasksController::class,'save'])
    ->name('task.save');

    Route::get('/{id}/delete', [App\Http\Controllers\TasksController::class, 'delete'])
    ->name('task.delete');

    Route::get('/{id}/edit', [App\Http\Controllers\TasksController::class, 'edit'])
        ->name('task.edit');

    Route::post('/{id}', [App\Http\Controllers\TasksController::class, 'update'])
        ->name('task.update');


});
