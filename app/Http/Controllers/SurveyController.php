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
        $validatedData = $this->validateSurveyData($request);

        $survey = new Survey();

        $survey->PeopleOnBoard = $validatedData['PeopleOnBoard'];
        $survey->TypeOfVessel = $validatedData['TypeOfVessel'];
        $survey->FirstVisit = $validatedData['FirstVisit'];
        $survey->WhichHarbour = $validatedData['WhichHarbour'];
        $survey->HearAboutHarbour = $validatedData['HearAboutHarbour'];
        $survey->OverallCleanliness = $validatedData['OverallCleanliness'];
        $survey->StaffFriendlyAndHelpful = $validatedData['StaffFriendlyAndHelpful'];
        $survey->SafetyAtTheHarbour = $validatedData['SafetyAtTheHarbour'];
        $survey->HowWouldYouRecommendToOthers = $validatedData['HowWouldYouRecommendToOthers'];
        $survey->QualityForMoney = $validatedData['QualityForMoney'];
        $survey->AnyAdditionalAmenitiesYouWouldLikeToSee = $validatedData['AnyAdditionalAmenitiesYouWouldLikeToSee'];
        $survey->DidYouHadAnyIssuesWithTheDocking = $validatedData['DidYouHadAnyIssuesWithTheDocking'];
        $survey->WouldYouConsiderReturningToHarbour = $validatedData['WouldYouConsiderReturningToHarbour'];

        $survey->save();
        return view('survey.thanks-eng');
    }

    public function validateSurveyData(Request $request)
    {
        return $request->validate([
            'PeopleOnBoard' => 'required|integer',
            'TypeOfVessel' => 'required|string',
            'FirstVisit' => 'required|string',
            'WhichHarbour' => 'required|string',
            'HearAboutHarbour' => 'required|string',
            'OverallCleanliness' => 'required|integer|min:1|max:5',
            'StaffFriendlyAndHelpful' => 'required|integer|min:1|max:5',
            'SafetyAtTheHarbour' => 'required|integer|min:1|max:5',
            'HowWouldYouRecommendToOthers' => 'required|integer|min:1|max:5',
            'QualityForMoney' => 'required|integer|min:1|max:5',
            'AnyAdditionalAmenitiesYouWouldLikeToSee' => 'required|string',
            'DidYouHadAnyIssuesWithTheDocking' => 'required|string',
            'WouldYouConsiderReturningToHarbour' => 'required|string',
        ]);
    }
}

