<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('PeopleOnBoard');
            $table->string('TypeOfVessel');
            $table->boolean('FirstVisit');
            $table->string('WhichHarbour');
            $table->string('HearAboutHarbour');
            $table->integer('OverallCleanliness');
            $table->integer('StaffFriendlyAndHelpful');
            $table->integer('SafetyAtTheHarbour');
            $table->integer('HowWouldYouRecommendToOthers');
            $table->integer('QualityForMoney');
            $table->string('AnyAdditionalAmenitiesYouWouldLikeToSee');
            $table->integer('DidYouHadAnyIssuesWithTheDocking');
            $table->integer('WouldYouConsiderReturningToHarbour');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
