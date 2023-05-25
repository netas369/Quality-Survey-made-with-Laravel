<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey>
 */
class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nationality' => $this->faker->randomElement(['Dutch', 'English', 'French', 'German']),
            'AgeOfVisitor' => $this->faker->numberBetween(1, 100),
            'TypeOfVessel' => $this->faker->randomElement(['Sailboat', 'Motorboat', 'Yacht']),
            'PeopleOnBoard' => $this->faker->numberBetween(1, 10),
            'WhichSeason' => $this->faker->randomElement(['Spring', 'Summer', 'Autumn', 'Winter']),
            'HearAboutHarbour' => $this->faker->randomElement(['Internet', 'Almanac', 'Recommended by others', 'Different']),
            'WhichHarbour' =>$this->faker->randomElement(['V.V.W Schelde', 'Stadshaven Scheldekwartier']),
            'FirstVisit' => $this->faker->boolean,
            'CompletePurpose' => $this->faker->boolean,
            'DescribeExperience' =>$this->faker->randomElement(['The marina has a nice atmosphere, and I enjoyed my stay', 'The marina was average for me the experience was alright', 'I had an unsatisfactory experience and I did not enjoy my stay']),
            'DescribeWebsite' =>$this->faker->randomElement(['It is a good-designed website', 'The website could use some improvements', 'I did not like the website']),
            'ConsiderAgain' => $this->faker->boolean,
            'OverallCleanliness' => $this->faker->numberBetween(1, 5),
            'StaffFriendlyAndHelpful' => $this->faker->numberBetween(1, 5),
            'SafetyAtTheHarbour' => $this->faker->numberBetween(1, 5),
            'OurFacilities' => $this->faker->numberBetween(1, 5),
            'RateOverallExperience' => $this->faker->numberBetween(1, 5),
            'RecommendToOthers' => $this->faker->numberBetween(1, 5),
            'QualityForMoney' => $this->faker->numberBetween(1, 5),
            'AnythingToImprove' => $this->faker->sentence(),
            'anyAdditionalAmenities' => $this->faker->sentence(),
            'SomethingToChangeWebsite' => $this->faker->sentence(),
            'AnythingLeft' => $this->faker->sentence(),
        ];
    }
}
