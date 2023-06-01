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

    public function showSurvey($locale = null)
    {
        if (!in_array($locale, array_keys(config('app.supported_locales')))) {
            $locale = config('app.locale');
        }

        app()->setLocale($locale);

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

        $survey->Nationality = $validatedData['Nationality'];
        $survey->AgeOfVisitor = $validatedData['AgeOfVisitor'];
        $survey->TypeOfVessel = $validatedData['TypeOfVessel'];
        $survey->PeopleOnBoard = $validatedData['PeopleOnBoard'];
        $survey->WhichSeason = $validatedData['WhichSeason'];
        $survey->HearAboutHarbour = $validatedData['HearAboutHarbour'];
        $survey->WhichHarbour = $validatedData['WhichHarbour'];
        $survey->FirstVisit = $validatedData['FirstVisit'];
        $survey->CompletePurpose = $validatedData['CompletePurpose'];
        $survey->DescribeExperience = $validatedData['DescribeExperience'];
        $survey->DescribeWebsite = $validatedData['DescribeWebsite'];
        $survey->ConsiderAgain = $validatedData['ConsiderAgain'];
        $survey->OverallCleanliness = $validatedData['OverallCleanliness'];
        $survey->StaffFriendlyAndHelpful = $validatedData['StaffFriendlyAndHelpful'];
        $survey->SafetyAtTheHarbour = $validatedData['SafetyAtTheHarbour'];
        $survey->OurFacilities = $validatedData['OurFacilities'];
        $survey->RateOverallExperience = $validatedData['RateOverallExperience'];
        $survey->RecommendToOthers = $validatedData['RecommendToOthers'];
        $survey->QualityForMoney = $validatedData['QualityForMoney'];
        $survey->AnythingToImprove = $validatedData['AnythingToImprove'];
        $survey->anyAdditionalAmenities = $validatedData['anyAdditionalAmenities'];
        $survey->SomethingToChangeWebsite = $validatedData['SomethingToChangeWebsite'];
        $survey->AnythingLeft = $validatedData['AnythingLeft'];

        $survey->save();

        $answers = $request->input('answers', []);

        // Process and store the answers in your desired way

        $start = $request->session()->get('start', 0);
        $start += 4;

        if ($request->has('prev')) {
            $start -= 8; // Jump back two pages if "Previous" button clicked
        }

        $request->session()->put('start', $start);

        return view('survey.thanks-eng');
    }

    public function validateSurveyData(Request $request)
    {
        return $request->validate([



            'Nationality' => 'required|string',
            'AgeOfVisitor' => 'required|integer|min:1|max:500',
            'TypeOfVessel' => 'required|string',
            'PeopleOnBoard' => 'required|integer|min:1|max:10',
            'WhichSeason' => 'required|string',
            'HearAboutHarbour' => 'required|string',
            'WhichHarbour' => 'required|string',
            'FirstVisit' => 'required|integer',
            'CompletePurpose' => 'required|integer',
            'DescribeExperience' => 'required|string',
            'DescribeWebsite' => 'required|string',
            'ConsiderAgain' => 'required|integer',
            'OverallCleanliness' => 'required|integer|min:1|max:5',
            'StaffFriendlyAndHelpful' => 'required|integer|min:1|max:5',
            'SafetyAtTheHarbour' => 'required|integer|min:1|max:5',
            'OurFacilities' => 'required|integer|min:1|max:5',
            'RateOverallExperience' => 'required|integer|min:1|max:5',
            'RecommendToOthers' => 'required|integer|min:1|max:5',
            'QualityForMoney' => 'required|integer|min:1|max:5',
            'AnythingToImprove' => 'string',
            'anyAdditionalAmenities' => 'string',
            'SomethingToChangeWebsite' => 'string',
            'AnythingLeft' => 'string',
        ]);
    }
}

