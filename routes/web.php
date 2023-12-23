<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Applicant\BrandController as ApplicantBrandController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\LandingPage\LandingPageController;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [LandingPageController::class, 'home']);
} );

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {

    // * Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
        route::resource('brands', BrandController::class)->only(['index', 'show', 'update', 'destroy']);
    });

    // * Applicant
    Route::group(['prefix' => 'applicant', 'as' => 'applicant.'], function() {
        Route::resource('brands', ApplicantBrandController::class);
    });

    // * Settings
    Route::group(['prefix' => 'settings'], function() {
        Route::get('profile', [ProfileController::class, 'profile'])->name('settings.profile');
            Route::put('profile/upload-image', [ProfileController::class, 'uploadImage'])->name('profile.upload_image');
            Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::get('account', [ProfileController::class, 'account'])->name('settings.account'); 
        });

});

Auth::routes(['verify' => true]);
require __DIR__.'/auth.php';

Auth::routes();
