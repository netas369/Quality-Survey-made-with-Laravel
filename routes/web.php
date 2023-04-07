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
Route::post('/survey', [SurveyController::class, 'store']);
Route::get('/survey/create', [SurveyController::class, 'create']);
Route::get('/survey', [SurveyController::class, 'show']);







Route::controller(DashboardController::class)->group(function() {
    Route::get('/dashboard', 'index');
});
