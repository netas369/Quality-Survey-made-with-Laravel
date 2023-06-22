<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

// TODO Arrange routes
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
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        /**
         * Survey Routes
         */
        Route::get('/survey', [SurveyController::class, 'index']);
        Route::get('/survey/submition/{locale?}', [SurveyController::class, 'showSurvey']);
        Route::post('/survey/submition/{locale?}', [SurveyController::class, 'store']);

        Route::get('/thanks/{locale?}', function ($locale = null) {
            if (!in_array($locale, array_keys(config('app.supported_locales')))) {
                $locale = config('app.locale');
            }

            app()->setLocale($locale);

            return view('survey.thanks-eng');
        })->name('thanks');

        Route::get('/forgot-password', function () {
            return view('auth.forgot-password');
        })->name('password.request');

        Route::post('/forgot-password', function (Request $request) {
            $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
        })->name('password.email');

        Route::get('/reset-password/{token}', function (string $token) {
            return view('auth.reset-password', ['token' => $token]);
        })->name('password.reset');

        Route::post('/reset-password', function (Request $request) {
            $request->validate([
                'token' => 'required',
                'password' => 'required|min:8|confirmed',
            ]);

            $status = Password::reset(
                $request->only('password', 'password_confirmation', 'token'),
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
        })->name('password.update');

        /**
         * Dashboard Routes
         */
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', function () {
                return redirect('login');
            });
        });

        Route::get('/register', function () {
            abort(403);
        });

    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/export-csv', [SurveyController::class, 'exportCSV'])->name('export.csv');

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index');
            Route::get('/settings', 'settings');
            Route::get('/reviews/{survey}', 'show')->name('dashboard.show');
            Route::post('/settings', 'change_credentials')->name('settings');
        });

        Route::post('/register', 'RegisterController@register')->name('register.perform');
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});


