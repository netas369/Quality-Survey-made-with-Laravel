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

Route::get('/', [WelcomeController::class, 'show']);

Route::post('/survey/{language}', [SurveyController::class, 'store']);
Route::get('/choosesurvey', [SurveyController::class, 'show'])->name('survey.choosesurvey');
Route::get('/choosesurvey/{language}', [SurveyController::class, 'create']);
Route::get('/survey/thanks-eng', function () {
    return view('survey.thanks-eng');
})->name('survey.thanks-eng');
Route::get('/survey/thanks-nl', function () {
    return view('survey.thanks-nl');
})->name('survey.thanks-nl');

Route::controller(DashboardController::class)->group(function() {Route::get('/dashboard', 'index');});
