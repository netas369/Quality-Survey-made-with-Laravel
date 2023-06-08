<?php

namespace App\Http\Controllers;

use App\Charts\HappinessBar;
use App\Models\Dashboard;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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

        $averageRatings = Survey::getLastSixMonthsAverageRatings();
        $lastMonthRating = Survey::getLastMonthRating();
        $currentYearRating = Survey::getCurrentYearRating();

        return view('dashboard.index', compact('currentMonthSurveyCount', 'totalSurveyCount', 'labels', 'data', 'averageRatings', 'lastMonthRating', 'currentYearRating'));

    }
    public function login(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('dashboard.login');
    }

    public function settings(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('dashboard.settings');
    }

    public function change_password(Request $request) {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->password = $request->password;
        $user->save();


        return redirect('dashboard');
    }

    /*
     * Display a page filled with reviews
     */
    public function reviews(Request $request)
    {
        // Retrieve the filter parameters from the request
        $filter = $request->only(['cleanliness', 'friendly', 'safety', 'recommendation', 'quality']);

        $filter = array_merge([
            'cleanliness' => null,
            'friendly' => null,
            'safety' => null,
            'recommendation' => null,
            'quality' => null,
        ], $filter);

        // Apply the filters to the query
        $query = Survey::query();

        if ($filter['cleanliness']) {
            $query->where('OverallCleanliness', $filter['cleanliness']);
        }

        if ($filter['friendly']) {
            $query->where('StaffFriendlyAndHelpful', $filter['friendly']);
        }

        if ($filter['safety']) {
            $query->where('SafetyAtTheHarbour', $filter['safety']);
        }

        if ($filter['recommendation']) {
            $query->where('RecommendToOthers', $filter['recommendation']);
        }

        if ($filter['quality']) {
            $query->where('QualityForMoney', $filter['quality']);
        }

        // Retrieve the paginated survey results with applied filters
        $survey = $query->paginate(20);

        $bar = new HappinessBar();

        // Fetch specific data using query builder
        $data = DB::table('surveys')
            ->select('OverallCleanliness', 'StaffFriendlyAndHelpful', 'SafetyAtTheHarbour', 'RecommendToOthers', 'QualityForMoney')
            ->get();

        // Calculate the average of the five columns
        $averageValues = $data->map(function ($row) {
            return ($row->OverallCleanliness + $row->StaffFriendlyAndHelpful + $row->SafetyAtTheHarbour + $row->RecommendToOthers  + $row->QualityForMoney) / 5;
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
     function update(Request $request, Dashboard $dashboard)
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
