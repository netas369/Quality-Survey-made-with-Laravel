<?php

namespace App\Http\Controllers;

use App\Charts\HappinessBar;
use App\Models\Dashboard;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Survey;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $latestAnswers = Survey::orderBy('created_at', 'desc')->take(10)->get();
        return view('dashboard.index', compact('latestAnswers'));
    }
    public function login(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('dashboard.login');
    }

    /**
     * Display a page filled with reviews
     */
    public function reviews(Dashboard $dashboard)
    {
        $survey = Survey::paginate(20);
        $bar = new HappinessBar();

        // Fetch specific data using query builder
        $data = DB::table('surveys')
            ->select('OverallCleanliness', 'StaffFriendlyAndHelpful', 'SafetyAtTheHarbour', 'HowWouldYouRecommendToOthers', 'QualityForMoney')
            ->get();

        // Calculate the average of the five columns
        $averageValues = $data->map(function ($row) {
            return ($row->OverallCleanliness + $row->StaffFriendlyAndHelpful + $row->SafetyAtTheHarbour + $row->HowWouldYouRecommendToOthers + $row->QualityForMoney) / 5;
        });

        // Calculate the overall average
        $averageSatisfaction = $averageValues->avg();

        return view('dashboard.reviews', compact('survey', 'bar', 'averageSatisfaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard, Survey $survey)
    {
        // Retrieve the id of the Dashboard object
        $survey_id = $survey->id;

        // Retrieve the Survey object that corresponds to the given Dashboard id
        $review = Survey::Find($survey_id);

        return view('dashboard.show', compact('review'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
