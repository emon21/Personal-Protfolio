<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\website\WebsiteController;
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
Route::get('/', [WebsiteController::class, 'index'])->name('website');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// =================================== Admin Route ===================================
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role']], function () {
    // Route::prefix('admin')->middleware(['auth', 'admin'])->group(function (){

    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    //Admin Profile

});

// ===================================  User Route  Start ===================================

Route::middleware(['auth'])->group(function () {

    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('user/profile', [UserController::class, 'UserProfile'])->name('user.profile');

});


 // ===================================  User Route End ===================================
