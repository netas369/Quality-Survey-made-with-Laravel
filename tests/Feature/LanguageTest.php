<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LanguageTest extends TestCase
{
    public function testSurveyPageInEnglish()
    {
        // Arrange
        $locale = 'en';
        $expectedText = 'Survey page is in English';

        // Act
        $response = $this->get('/survey/submition/' . $locale);

        // Assert
        $response->assertStatus(200)
            ->assertSeeText('how many people do/did you have onboard');
    }

    public function testSurveyPageInDutch()
    {
        // Arrange
        $locale = 'nl';
        $expectedText = 'Survey Page is in Dutch';

        // Act
        $response = $this->get('/survey/submition/' . $locale);

        // Assert
        $response->assertStatus(200)
            ->assertSeeText('hoeveel mensen heb/had je aan boord');
    }

    public function testSurveyPageInFrench()
    {
        // Arrange
        $locale = 'fr';
        $expectedText = 'Survey Page is in French';

        // Act
        $response = $this->get('/survey/submition/' . $locale);

        // Assert
        $response->assertStatus(200)
            ->assertSeeText('combien de personnes avez-vous/aviez-vous à bord');
    }

    public function testSurveyPageInGerman()
    {
        // Arrange
        $locale = 'de';
        $expectedText = 'Survey Page is in German';

        // Act
        $response = $this->get('/survey/submition/' . $locale);

        // Assert
        $response->assertStatus(200)
            ->assertSeeText('Wie viele Leute sind/hatten Sie an Bord?');
    }
}
