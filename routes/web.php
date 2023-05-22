<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');;

// Routes for Survey page
//Route::post('/survey/{language}', [SurveyController::class, 'store']);
//Route::get('/survey/{language}', [SurveyController::class, 'create']);

Route::get('/survey', [SurveyController::class, 'index']);
Route::get('/survey/submition', [SurveyController::class, 'showSurvey']);
Route::post('/survey/submition', [SurveyController::class, 'store']);
//Route::get('/survey/thanks-eng', function () {
//    return view('survey.thanks-eng');
//})->name('survey.thanks-eng');
//Route::get('/survey/thanks-nl', function () {
//    return view('survey.thanks-nl');
//})->name('survey.thanks-nl');


// Routes for dashboard page
Route::controller(DashboardController::class)->group(function() {Route::get('/dashboard', 'index');});
Route::controller(DashboardController::class)->group(function() {Route::get('/login', 'login');});
Route::controller(DashboardController::class)->group(function() {Route::get('/reviews', 'reviews');});
Route::get('/reviews', [\App\Http\Controllers\SatisfactionController::class, 'showSatisfaction'])->name('reviews');
Route::get('/reviews/{survey}', [DashboardController::class, 'show'])->name('dashboard.show');

