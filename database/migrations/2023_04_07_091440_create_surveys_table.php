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
            $table->integer('AdultsOnBoard');
            $table->string('AgeOfChildren');
            $table->string('TypeOfVessel');
            $table->string('FirstVisit');
            $table->string('HearAboutHarbour');
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
