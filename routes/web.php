<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;

// Routes for dashboard page
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/login', [DashboardController::class, 'login']);
Route::get('/reviews', [DashboardController::class, 'reviews'])->name('dashboard.reviews');
Route::get('/reviews/{survey}', [DashboardController::class, 'show'])->name('dashboard.show');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'WelcomeController@index')->name('welcome.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        /**
         * Survey Routes
         */
        Route::get('/survey', [SurveyController::class, 'index']);
        Route::get('/survey/submition/{locale?}', [SurveyController::class, 'showSurvey']);
        Route::post('/survey/submition', [SurveyController::class, 'store']);

        /**
         * Dashboard Routes
         */
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', function () {
                return redirect('login');
            });
        });
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index');
            Route::get('/settings', 'settings');
            Route::get('/reviews/{survey}', 'show')->name('dashboard.show');
            Route::post('/settings', 'change_password')->name('settings');
        });

        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});


