<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SatisfactionController extends Controller
{
    public function showSatisfaction()
    {
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

        // Pass the average satisfaction to the view
        return view('dashboard.reviews', ['averageSatisfaction' => $averageSatisfaction]);
    }
}
