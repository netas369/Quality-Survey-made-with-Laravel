<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display the welcome message.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('survey.show');
    }

    public function Create()
    {
        return view('survey.show');
    }
}
