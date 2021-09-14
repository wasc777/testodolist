<?php

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'showall'])->name('tasks')->middleware('auth');
Route::post('/tasks', [TaskController::class, 'ajouter'])->name('tasks.ajouter');
Route::get('/tasks/{id}', [TaskController::class, 'deletetask'])->name('tasks.delete');

Route::get('/tasks/modifier/{id}', [TaskController::class, 'showmodifier'])->name('tasks.showmodifier');
Route::post('/tasks/modifier/{id}', [TaskController::class, 'modifier'])->name('tasks.modifier');

Route::get('/user', [UserController::class, 'user'])->name('user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

