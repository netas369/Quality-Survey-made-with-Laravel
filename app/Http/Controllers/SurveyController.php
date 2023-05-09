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
        $survey->TypeOfVessel = $request->input('TypeOfVessel');
        $survey->FirstVisit = $request->input('FirstVisit');
        $survey->HearAboutHarbour = $request->input('HearAboutHarbour');
        $survey->OverallCleanliness = $request->input('OverallCleanliness');
        $survey->StaffFriendlyAndHelpful = $request->input('StaffFriendlyAndHelpful');
        $survey->SafetyAtTheHarbour = $request->input('SafetyAtTheHarbour');
        $survey->HowWouldYouRecommendToOthers = $request->input('HowWouldYouRecommendToOthers');
        $survey->QualityForMoney = $request->input('QualityForMoney');
        $survey->AnyAdditionalAmenitiesYouWouldLikeToSee = $request->input('AnyAdditionalAmenitiesYouWouldLikeToSee');
        $survey->DidYouHadAnyIssuesWithTheDocking = $request->input('DidYouHadAnyIssuesWithTheDocking');
        $survey->WouldYouConsiderReturningToHarbour = $request->input('WouldYouConsiderReturningToHarbour');


        $survey->save();
        return view('survey.thanks-eng');
    }}
