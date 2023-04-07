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

    public function create()
    {
        return view('survey.create');
    }

    public function store()
    {
        $survey = new Survey();

        $survey->name = request('name');
        $survey->gender = request('gender');
        $survey->country = request('country');

        $survey->save();
    }
}
