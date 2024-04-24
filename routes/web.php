<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SurveyController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

// Route::group(['namespace' => 'App\Http\Controllers'], function () {
//     /**
//      * Home Routes
//      */
//     Route::get('/', 'WelcomeController@index')->name('welcome.index');
//     /*
//      * Guest Routes
//     */
//     Route::group(['middleware' => ['guest']], function () {
//         /**
//          * Login Routes
//          */
//         Route::controller(LoginController::class)->group(function () {
//             Route::get('/login', 'show')->name('login');
//             Route::post('/login', 'login')->name('login.perform');
//         });

//         /**
//          * Survey Routes
//          */
//         Route::controller(SurveyController::class)->group(function () {
//             Route::get('/survey', 'index');
//             Route::get('/survey/submition/{locale?}', 'showSurvey');
//             Route::post('/survey/submition/{locale?}', 'store');
//         });


//         Route::get('/thanks/{locale?}', function ($locale = null) {
//             if (!in_array($locale, array_keys(config('app.supported_locales')))) {
//                 $locale = config('app.locale');
//             }

//             app()->setLocale($locale);

//             return view('survey.thanks-eng');
//         })->name('thanks');

//         /**
//          * Dashboard Routes
//          */
//         Route::controller(DashboardController::class)->group(function () {
//             Route::get('/dashboard', function () {
//                 return redirect('login');
//             });
//         });

//         // Route::get('/register', function () {
//         //     abort(403);
//         // });

//         Route::controller(RegisterController::class)->group(function () {
//             Route::get('/register', 'show')->name('register');
//             Route::post('/register', 'register')->name('register.perform');
//         });

//     });

//     Route::group(['middleware' => ['auth']], function () {
//         Route::get('/export-csv', [SurveyController::class, 'exportCSV'])->name('export.csv');

//         Route::controller(DashboardController::class)->group(function () {
//             Route::get('/dashboard', 'index');
//             Route::get('/settings', 'settings');
//             Route::get('/reviews', 'reviews')->name('dashboard.reviews');
//             Route::get('/reviews/{survey}', 'show')->name('dashboard.show');
//             Route::post('/settings', 'change_credentials')->name('settings');
//         });

//         Route::post('/register', 'RegisterController@register')->name('register.perform');
//         Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
//     });


    Route::group(['namespace' => 'App\Http\Controllers'], function () {
        /**
         * Home Routes
         */
        Route::get('/', 'WelcomeController@index')->name('welcome.index');

        /**
         * Login and Registration Routes (Guest-only access)
         */
        Route::group(['middleware' => ['guest']], function () {
            Route::controller(LoginController::class)->group(function () {
                Route::get('/login', 'show')->name('login');
                Route::post('/login', 'login')->name('login.perform');
            });

            Route::controller(RegisterController::class)->group(function () {
                Route::get('/register', 'show')->name('register');
                Route::post('/register', 'register')->name('register.perform');
            });
        });

        /**
         * Publicly Accessible Routes (No Authentication Required)
         */
        Route::controller(SurveyController::class)->group(function () {
            Route::get('/survey', 'index');
            Route::get('/survey/submission/{locale?}', 'showSurvey');
            Route::post('/survey/submission/{locale?}', 'store');
        });

        Route::get('/thanks/{locale?}', function ($locale = null) {
            if (!in_array($locale, array_keys(config('app.supported_locales')))) {
                $locale = config('app.locale');
            }
            app()->setLocale($locale);
            return view('survey.thanks-eng');
        })->name('thanks');

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index');
            Route::get('/settings', 'settings');
            Route::get('/reviews', 'reviews')->name('dashboard.reviews');
            Route::get('/reviews/{survey}', 'show')->name('dashboard.show');
            Route::post('/settings', 'change_credentials')->name('settings');
            Route::get('/export-csv', [SurveyController::class, 'exportCSV'])->name('export.csv');
        });

        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });



