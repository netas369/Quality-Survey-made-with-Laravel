<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
