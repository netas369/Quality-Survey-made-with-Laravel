<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Survey extends Model
{
    use HasFactory;

    public function rating()
    {

        $ratingAverage = ($this->OverallCleanliness + $this->StaffFriendlyAndHelpful + $this->SafetyAtTheHarbour +

                        $this->HowWouldYouRecommendToOthers + $this->QualityForMoney) / 5;
        if ($ratingAverage > 3.7) {
            return $ratingAverage.'😀';
        } else if($ratingAverage < 2.6) {
            return $ratingAverage.'😥';
        } else {
            return $ratingAverage.'🙂';
        }
        return null;
    }

    public static function getLastSixMonthsAverageRatings()
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        $currentMonth = Carbon::now();

        $averageRatings = self::selectRaw('DATE_FORMAT(created_at, "%Y-%m") AS month, ROUND(AVG((
            ConsiderAgain + OverallCleanliness + StaffFriendlyAndHelpful +
            SafetyAtTheHarbour + OurFacilities + RateOverallExperience +
            RecommendToOthers + QualityForMoney
        ) / 8), 2) AS average_rating')
            ->whereBetween('created_at', [$sixMonthsAgo, $currentMonth])
            ->groupBy('month')
            ->pluck('average_rating', 'month')
            ->toArray();

        return $averageRatings;
    }


    public static function getLastMonthRating()
    {
        $thirtyDaysAgo = Carbon::now()->subDays(30);
        $currentDate = Carbon::now();

        $averageRatingLast30Days = self::whereBetween('created_at', [$thirtyDaysAgo, $currentDate])
            ->selectRaw('ROUND((
        (ConsiderAgain + OverallCleanliness + StaffFriendlyAndHelpful +
        SafetyAtTheHarbour + OurFacilities + RateOverallExperience +
        RecommendToOthers + QualityForMoney
    ) / 8), 1) as average_rating')
            ->first()
            ->average_rating;

        return $averageRatingLast30Days;
    }

    public static function getCurrentYearRating()
    {
        $currentYear = Carbon::now()->year;

        $averageRatingsCurrentYear = self::whereYear('created_at', $currentYear)
            ->selectRaw('ROUND((
            (SUM(ConsiderAgain) + SUM(OverallCleanliness) + SUM(StaffFriendlyAndHelpful) +
            SUM(SafetyAtTheHarbour) + SUM(OurFacilities) + SUM(RateOverallExperience) +
            SUM(RecommendToOthers) + SUM(QualityForMoney)
        ) / (COUNT(*) * 8)), 1) as average_rating')
            ->first()
            ->average_rating;

        return $averageRatingsCurrentYear;
    }

}
