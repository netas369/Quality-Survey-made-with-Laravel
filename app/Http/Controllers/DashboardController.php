<?php

namespace App\Http\Controllers;

use App\Charts\HappinessBar;
use App\Models\Dashboard;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Dashboard $dashboard)
    {

        // how many surveys have been completed this month
        $currentMonthSurveyCount = Survey::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Total surveys in the database
        $totalSurveyCount = Survey::count();

        // Graph 3 to retrieve for the last 7 months how many surveys have been completed
        $currentMonth = Carbon::now();
        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $currentMonth = Carbon::now(); // Reset $currentMonth in each iteration
            $month = $currentMonth->subMonths($i);
            $labels[] = $month->format('F');

            $surveyCount = Survey::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            $data[] = $surveyCount;
        }
        return view('dashboard.index', compact('currentMonthSurveyCount', 'totalSurveyCount', 'labels', 'data'));

        $latestAnswers = Survey::orderBy('created_at', 'desc')->take(10)->get();
        return view('dashboard.index', compact('latestAnswers'));
    }
    public function login(Dashboard $dashboard)
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

        return view('dashboard.reviews', compact('survey', 'bar'));
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
