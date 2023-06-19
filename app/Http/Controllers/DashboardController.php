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
        $unreadCount = Survey::where('is_read', false)->count();

        $pieChart = [
            'V.V.W Schelde' => Survey::where('WhichHarbour', 'V.V.W Schelde')->count(),
            'Stadshaven Scheldekwartier' => Survey::where('WhichHarbour', 'Stadshaven Scheldekwartier')->count(),
        ];

        return view('dashboard.index', compact('currentMonthSurveyCount', 'totalSurveyCount', 'labels', 'data', 'averageRatings', 'lastMonthRating', 'currentYearRating', 'pieChart', 'unreadCount'));

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
        $filter = $request->only(['start_date', 'end_date', 'typeOfVessel', 'marina', 'read']);

        // Apply the filters to the query
        $query = Survey::query();

        if (isset($filter['start_date']) && isset($filter['end_date'])) {
            $startDate = $filter['start_date'];
            $endDate = $filter['end_date'];

            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        if (isset($filter['typeOfVessel']) && $filter['typeOfVessel']) {
            $vesselTypes = explode(',', $filter['typeOfVessel']);
            $query->whereIn('typeOfVessel', $vesselTypes);
        }

        if (isset($filter['marina']) && $filter['marina']) {
            $marinas = explode(',', $filter['marina']);
            $query->whereIn('WhichHarbour', $marinas);
        }

        if (isset($filter['read']) && $filter['read']) {
            $query->where('is_read', $filter['read']);
        }

        // Retrieve the paginated survey results with applied filters
        $survey = $query->paginate(20)->appends($filter);

        return view('dashboard.reviews', compact('survey'));
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
        $review = Survey::findOrFail($survey_id);
        $review->is_read = true;
        $review->save();


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
