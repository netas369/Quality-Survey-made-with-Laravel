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
            'PeopleOnBoard' => $this->faker->numberBetween(1, 10),
            'TypeOfVessel' => $this->faker->randomElement(['Sailboat', 'Motorboat', 'Yacht']),
            'FirstVisit' => $this->faker->boolean,
            'WhichHarbour' =>$this->faker->randomElement(['V.V.W Schelde', 'Stadshaven Scheldekwartier']),
            'HearAboutHarbour' => $this->faker->randomElement(['Internet', 'Almanac', 'Recommended by others', 'Different']),

            'OverallCleanliness' => $this->faker->numberBetween(1, 5),
            'StaffFriendlyAndHelpful' => $this->faker->numberBetween(1, 5),
            'SafetyAtTheHarbour' => $this->faker->numberBetween(1, 5),
            'HowWouldYouRecommendToOthers' => $this->faker->numberBetween(1, 5),
            'QualityForMoney' => $this->faker->numberBetween(1, 5),
            'AnyAdditionalAmenitiesYouWouldLikeToSee' => $this->faker->sentence(),
            'DidYouHadAnyIssuesWithTheDocking' => $this->faker->numberBetween(0, 1),
            'WouldYouConsiderReturningToHarbour' => $this->faker->numberBetween(0, 1)
        ];
    }
}
