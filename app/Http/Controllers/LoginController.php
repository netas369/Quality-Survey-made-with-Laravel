<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (Auth::attempt($credentials)) {
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user, $request->get('remember'));

            return $this->authenticated($request, $user);
        }

        return redirect()->to('login')->withErrors(trans('auth.failed'));

//        if(!Auth::validate($credentials)):
//            redirect()->to('login')->withErrors(trans('auth.failed'));
//        endif;


    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect('dashboard');
    }
}
