<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ClassGroupController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\user\ClassificationController;

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
    return view('auth.login');
});

Auth::routes();

// user route
Route::middleware(['auth', 'user-role:user'])->prefix('user')->group(function()
{
    Route::get("/dashboard", [UserDashboardController::class, 'index'])->name('user.dashboard');

    // class group
    Route::get("/class-group", [ClassGroupController::class, 'index'])->name('user.class-group');
    Route::post("/class-group", [ClassGroupController::class, 'store'])->name('user.class-group.create');
    Route::get("/class-group/list", [ClassGroupController::class, 'list'])->name('user.class-group.list');
    Route::post("/class-group/update", [ClassGroupController::class, 'update'])->name('user.class-group.update');
    Route::delete("/class-group/destroy/{id}", [ClassGroupController::class, 'destroy'])->name('user.class-group.destroy');

    // classification
    Route::get("/classification", [ClassificationController::class, 'index'])->name('user.classification');
    Route::post("/classification", [ClassificationController::class, 'store'])->name('user.classification.create');
    Route::get("/classification/list", [ClassificationController::class, 'list'])->name('user.classification.list');
    Route::post("/classification/update", [ClassificationController::class, 'update'])->name('user.classification.update');
    Route::delete("/classification/destroy/{id}", [ClassificationController::class, 'destroy'])->name('user.classification.destroy');
});