<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;


use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminSettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;


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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');
   Route::match(['get', 'post'] , 'admin/login' , [AuthController::class, 'login'])->name('admin/login');

    Route::prefix('admin')->middleware(['auth'])->group(function() {
        Route::get('logout', [AuthController::class, 'logout'])->name('admin/logout');
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin/dashboard');

        //admin settings
        Route::match(['get' , 'post'] , 'profile', [AdminSettingController::class, 'profile'])->name('admin/profile');
        Route::get('password', [AdminSettingController::class, 'password'])->name('admin/password');
        Route::post('update_password', [AdminSettingController::class, 'updatePassword'])->name('admin/update_password');

        //CRUD for category
        Route::resource('category', CategoryController::class);

        //CRUD for subcategory
        Route::resource('subcategory', SubcategoryController::class);

    });
