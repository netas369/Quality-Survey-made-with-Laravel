<?php

namespace App\Http\Controllers;

use App\Models\Survey;
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
        return view('survey.choosesurvey');
    }

    public function create($language)
    {
        if ($language === 'survey-eng') {
            return view('survey.survey-eng');
        } elseif ($language === 'survey-nl') {
            return view('survey.survey-nl');
        } else {
            abort(404);
        }
    }

    public function store()
    {
        $survey = new survey();

        $survey->PeopleOnBoard = request('PeopleOnBoard');
        $survey->AdultsOnBoard = request('AdultsOnBoard');
        $survey->AgeOfChildren = request('AgeOfChildren');
        $survey->TypeOfVessel = request('TypeOfVessel');
        $survey->FirstVisit = request('FirstVisit');
        $survey->HearAboutHarbour = request('HearAboutHarbour');

        $survey->save();

        return redirect()->route('survey.choosesurvey')->with('success', 'Thank you! The survey is send to oure secratary!');
    }
}
