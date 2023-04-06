<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display the welcome message.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('welcome');
    }
}
