<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// user route
Route::middleware(['auth', 'user-role:user'])->group(function()
{
    Route::get("/home", [HomeController::class, 'userHome'])->name('home');
});

// admin route
Route::middleware(['auth', 'user-role:admin'])->group(function()
{
    Route::get("/admin/home", [HomeController::class, 'adminHome'])->name('home.admin');
});

// superadmin route
Route::middleware(['auth', 'user-role:superadmin'])->group(function()
{
    Route::get("/superadmin/home", [HomeController::class, 'superadminHome'])->name('home.superadmin');
});