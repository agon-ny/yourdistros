<?php

use App\Http\Controllers\DistrosController;
use App\Http\Controllers\UserController;
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


// GET ROUTES
// Showing Home page with All distros
Route::get('/', [DistrosController::class, 'showDistros']);

// Showing register page for guests
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// Showing login page for guests
Route::get('/login', [UserController::class, 'login'])->middleware('guest');

// Showing a page to create a new distro
Route::get('/newdistro', [DistrosController::class, 'newdistro'])->middleware('auth');

// Showing manage page
Route::get('/manage', [DistrosController::class, 'manage'])->middleware('auth');

// Showing a edit distro page
Route::get('/{distro}/edit', [DistrosController::class, 'showEditDistro'])->middleware('auth');

// Showing a single page distro
Route::get('/{distro}', [DistrosController::class, 'showSingleDistro']);

// PUT ROUTES
// Editing a distro
Route::put('/{distro}/edit/put', [DistrosController::class, 'edit'])->middleware('auth');

// DELETE ROUTES
// Deleting a distro
Route::delete('/{distro}/delete', [DistrosController::class, 'delete'])->middleware('auth');

// POST ROUTES
// Storing a new user
Route::post('/register/store', [UserController::class, 'store'])->middleware('guest');

// Log a user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Authenticate a user/log a user in
Route::post('/login/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// Storing a new distro
Route::post('/newdistro/store', [DistrosController::class, 'store'])->middleware('auth');