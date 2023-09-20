<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

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

route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/create', [CrudController::class, 'create'])->name('user.create');
Route::post('/users', [CrudController::class, 'store'])->name('users.store');
Route::delete('/users{person}',[CrudController::class, 'destroy'])->name('users.destroy');
