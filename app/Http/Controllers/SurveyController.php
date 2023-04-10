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
    public function index()
    {
        return view('survey.index');
    }

    public function showSurvey()
    {
        return view('survey.survey');
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

    public function store(Request $request)
    {
        $survey = new Survey();

        $survey->PeopleOnBoard = $request->input('PeopleOnBoard');
        $survey->AdultsOnBoard = $request->input('AdultsOnBoard');
        $survey->AgeOfChildren = $request->input('AgeOfChildren');
        $survey->TypeOfVessel = $request->input('TypeOfVessel');
        $survey->FirstVisit = $request->input('FirstVisit');
        $survey->HearAboutHarbour = $request->input('HearAboutHarbour');

        $survey->save();
        return view('survey.thanks-eng');
    }}
