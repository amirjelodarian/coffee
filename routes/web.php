<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Models\Survey;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('survey/create', [SurveyController::class, 'create'])->name('survey-create');
Route::get('survey/show', [SurveyController::class, 'show'])->name('survey-single');



Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


