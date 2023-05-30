<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Lang;

class LanguageFileTest extends TestCase
{
    public function testLanguageFilesHaveSameCountAsDefault()
    {
        $defaultLocale = 'en';
        $localesToCompare = ['nl', 'fr', 'de'];

        $defaultStrings = $this->getLanguageStrings($defaultLocale);
        $defaultCount = count($defaultStrings);

        foreach ($localesToCompare as $locale) {
            $localeStrings = $this->getLanguageStrings($locale);
            $localeCount = count($localeStrings);

            // Assert that the language file has the same count as the default locale
            $this->assertEquals($defaultCount, $localeCount, "Language file for locale '{$locale}' does not have the same count as the default locale '{$defaultLocale}'");
        }
    }

    public function testLanguageFilesDoNotContainEmptyStrings()
    {
        $localesToCheck = ['en', 'nl', 'fr', 'de'];

        foreach ($localesToCheck as $locale) {
            $strings = $this->getLanguageStrings($locale);

            foreach ($strings as $key => $value) {
                $this->assertNotEmpty($value, "Language file for locale '{$locale}' has an empty string for key '{$key}'");
            }
        }
    }

    /**
     * Helper method to get the language strings for a specific locale.
     */
    private function getLanguageStrings($locale)
    {
        $languageFile = resource_path("lang/{$locale}/messages.php");

        return require $languageFile;
    }
}
