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
            ->assertSeeText('What is your nationality');
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
            ->assertSeeText('Wat is uw nationaliteit?');
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
            ->assertSeeText('Quelle est ta nationalité ?');
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
            ->assertSeeText('Was ist deine Nationalität?');
    }

    public function testLocaleFallback()
    {
        // Arrange
        $incorrectLocale = 'us';

        // Act
        $response = $this->get('/survey/submition/' . $incorrectLocale);

        // Incorrect locale should load in default locale en
        $response->assertStatus(200)
            ->assertViewIs('survey.survey')
            ->assertSeeText('What is your nationality');
    }
}
