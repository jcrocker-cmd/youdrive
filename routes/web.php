<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\AddCarController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\AdminphotoController;

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

Route::post('/signin', [SigninController::class, 'save'])->name('signin.save');
Route::post('/login', [LoginController::class,'save']);
Route::post('/checklogin', [LoginController::class,'checklogin']);
Route::post('/addcar', [AddCarController::class,'save']);
Route::put('/adminpp', [AdminphotoController::class,'save']);




// Dashboard Routes

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/editcar', function () {
    return view('dashboard.editcar');
});

Route::get('/allusers', function () {
    return view('dashboard.viewuser');
});

Route::get('/allusers', [SocialiteController::class,'socialite_users']);
Route::get('/all-vehicles', [AddCarController::class,'db_allvehicles']);
Route::get('/delete_car/{id}', [AddCarController::class,'delete_car'])->name('delete_car');
Route::get('/viewcar/{id}', [AddCarController::class,'db_viewvehicle']);
Route::get('/editcar/{id}', [AddCarController::class,'db_editcar']);
Route::put('/updatecar/{id}', [AddCarController::class,'db_updatecar']);
Route::get('/settings', [AdminphotoController::class,'admin_view_info']);





Route::get('/rented', function () {
    return view('dashboard.rented-cars');
});


Route::get('/add', function () {
    return view('dashboard.add-car');
});


Route::get('/notification', function () {
    return view('dashboard.notification');
});

Route::get('/dashboard-login', function () {
    return view('dashboard.dashboard-login');
});


// Home Routes

Route::get('/', function () {
    return view('home.homepage');
});




Route::get('/log-in', [LoginController::class,'loginroute'])->middleware('alreadyLoggedIn');
Route::get('/sign-in', [SigninController::class,'signinroute'])->middleware('alreadyLoggedIn');


// Main Routes
Route::get('/mainhome', [AddCarController::class,'main_allcars'])->middleware('isLoggedIn');
Route::get('/mainviewcar/{id}', [AddCarController::class,'main_viewvehicle'])->middleware('isLoggedIn');
Route::get('/logout', [LoginController::class,'logout']);



// Google Auth
Route::get('/auth/google/redirect', [SocialiteController::class, 'googleredirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'googlecallback']);

//Facebook Auth
Route::get('/auth/facebook/redirect', [SocialiteController::class, 'facebookredirect']);
Route::get('/auth/facebook/callback', [SocialiteController::class, 'facebookcallback']);