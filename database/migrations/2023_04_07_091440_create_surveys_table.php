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
            $table->string('Nationality');
            $table->integer('AgeOfVisitor');
            $table->string('TypeOfVessel');
            $table->integer('PeopleOnBoard');
            $table->string('WhichSeason');
            $table->string('HearAboutHarbour');
            $table->string('WhichHarbour');
            $table->integer('FirstVisit');
            $table->integer('CompletePurpose');
            $table->string('DescribeExperience');
            $table->string('DescribeWebsite');
            $table->integer('ConsiderAgain');
            $table->integer('OverallCleanliness');
            $table->integer('StaffFriendlyAndHelpful');
            $table->integer('SafetyAtTheHarbour');
            $table->integer('OurFacilities');
            $table->integer('RateOverallExperience');
            $table->integer('RecommendToOthers');
            $table->integer('QualityForMoney');
            $table->string('AnythingToImprove');
            $table->string('anyAdditionalAmenities');
            $table->string('SomethingToChangeWebsite');
            $table->string('AnythingLeft');
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
