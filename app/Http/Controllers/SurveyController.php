<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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

    public function edit() {
        return view('survey.edit');
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

    public function store(Request $request, $locale = null)
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

        // Get the currently set locale
        $locale = $locale ?: app()->getLocale();

        // Redirect to the thanks-eng route with the locale parameter
        return redirect()->route('thanks', ['locale' => $locale]);
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
            'AnythingToImprove' => 'nullable|string',
            'anyAdditionalAmenities' => 'nullable|string',
            'SomethingToChangeWebsite' => 'nullable|string',
            'AnythingLeft' => 'nullable|string',
        ]);
    }

    public function exportCSV()
    {
        $surveys = Survey::all();

        $csvFileName = 'All-Survey-Data.csv';

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ];

        $columns = [
            'id',
            'Nationality',
            'AgeOfVisitor',
            'TypeOfVessel',
            'PeopleOnBoard',
            'WhichSeason',
            'HearAboutHarbour',
            'WhichHarbour',
            'FirstVisit',
            'CompletePurpose',
            'DescribeExperience',
            'DescribeWebsite',
            'ConsiderAgain',
            'OverallCleanliness',
            'StaffFriendlyAndHelpful',
            'SafetyAtTheHarbour',
            'OurFacilities',
            'RateOverallExperience',
            'RecommendToOthers',
            'QualityForMoney',
            'AnythingToImprove',
            'anyAdditionalAmenities',
            'SomethingToChangeWebsite',
            'AnythingLeft',
            'created_at',
            'updated_at',
        ];

        $callback = function () use ($surveys, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($surveys as $survey) {
                $row = [];
                foreach ($columns as $column) {
                    $row[] = $survey->{$column};
                }
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}

