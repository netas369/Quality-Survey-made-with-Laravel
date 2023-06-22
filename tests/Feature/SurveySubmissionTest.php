<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SurveySubmissionTest extends TestCase
{
    use WithFaker;

    public function testValidSurveySubmission()
    {
        $response = $this->post('/survey/submition/{locale?}', [
            'Nationality' => 'Dutch',
            'AgeOfVisitor' => 30,
            'TypeOfVessel' => 'Sailboat',
            'PeopleOnBoard' => 5,
            'WhichSeason' => 'Summer',
            'HearAboutHarbour' => 'almanac',
            'WhichHarbour' => 'Stadshaven Scheldekwartier',
            'FirstVisit' => 0,
            'CompletePurpose' => 0,
            'DescribeExperience' => "I had an unsatisfactory experience and I did not enjoy my stay",
            'DescribeWebsite' => "I did not like the website",
            'ConsiderAgain' => 0,
            'OverallCleanliness' => 3,
            'StaffFriendlyAndHelpful' => 3,
            'SafetyAtTheHarbour' => 3,
            'OurFacilities' => 3,
            'RateOverallExperience' => 3,
            'RecommendToOthers' => 3,
            'QualityForMoney' => 3,
            'AnythingToImprove' => 'this is from test function',
            'anyAdditionalAmenities' => 'this is from test function',
            'SomethingToChangeWebsite' => 'this is from test function',
            'AnythingLeft' => 'this is from test function',
        ]);

        $response->assertRedirect(); // Assert that the response is a redirect
        $response->assertStatus(302); // Optional: Assert the specific status code

    }

    public function testInvalidSurveySubmission()
    {
        $response = $this->post('/survey/submition/{locale?}', [
            'Nationality' => 'Dutch',
            'AgeOfVisitor' => 'Thirty',
            'TypeOfVessel' => 'Sailboat',
            'PeopleOnBoard' => 5,
            'WhichSeason' => 'Summer',
            'HearAboutHarbour' => 'almanac',
            'WhichHarbour' => 'Stadshaven Scheldekwartier',
            'FirstVisit' => 0,
            'CompletePurpose' => 0,
            'DescribeExperience' => "I had an unsatisfactory experience and I did not enjoy my stay",
            'DescribeWebsite' => "I did not like the website",
            'ConsiderAgain' => 0,
            'OverallCleanliness' => 0,
            'StaffFriendlyAndHelpful' => 0,
            'SafetyAtTheHarbour' => 0,
            'OurFacilities' => 0,
            'RateOverallExperience' => 0,
            'RecommendToOthers' => 0,
            'QualityForMoney' => 0,
            'AnythingToImprove' => 'this is from test function',
            'anyAdditionalAmenities' => 'this is from test function',
            'SomethingToChangeWebsite' => 'this is from test function',
            'AnythingLeft' => 'this is from test function',
        ]);

        $response->assertStatus(302); // Assert the expected status code for validation failure
        $response->assertSessionHasErrors([
            'AgeOfVisitor',
            'OverallCleanliness',
            'StaffFriendlyAndHelpful',
            'SafetyAtTheHarbour',
            'OurFacilities',
            'RateOverallExperience',
            'RecommendToOthers',
            'QualityForMoney',
        ]); // Assert that the specified fields have validation errors
    }
}
