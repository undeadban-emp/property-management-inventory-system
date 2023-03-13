<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\ItemsController;
use App\Http\Controllers\User\ClassGroupController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\user\ClassificationController;
use App\Http\Controllers\User\InventoryCustodianController;

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

    // items
    Route::get("/items", [ItemsController::class, 'index'])->name('user.items');
    Route::post("/items/create", [ItemsController::class, 'store'])->name('user.items.create');
    Route::get("/items/list", [ItemsController::class, 'list'])->name('user.items.list');
    Route::post("/items/update", [ItemsController::class, 'update'])->name('user.items.update');
    Route::delete("/items/destroy/{id}", [ItemsController::class, 'destroy'])->name('user.items.destroy');

    // account
    Route::get("/account", [AccountController::class, 'index'])->name('user.account');
    Route::post("/account/create", [AccountController::class, 'store'])->name('user.account.create');
    Route::get("/account/list", [AccountController::class, 'list'])->name('user.account.list');
    Route::post("/account/update", [AccountController::class, 'update'])->name('user.account.update');
    Route::post("/account/reset-password", [AccountController::class, 'reset'])->name('user.account.reset');
    Route::delete("/account/destroy/{id}", [AccountController::class, 'destroy'])->name('user.account.destroy');

    // account
    Route::get("/inventor-custodian", [InventoryCustodianController::class, 'index'])->name('user.inventory-custodian.index');
    Route::get("/inventor-custodian/create", [InventoryCustodianController::class, 'create'])->name('user.inventory-custodian.create');
    Route::post("/inventor-custodian/store", [InventoryCustodianController::class, 'store'])->name('user.inventory-custodian.store');
    Route::get("/inventor-custodian/list", [InventoryCustodianController::class, 'list'])->name('user.inventory-custodian.list');
});