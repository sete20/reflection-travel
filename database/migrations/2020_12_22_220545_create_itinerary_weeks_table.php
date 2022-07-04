<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItineraryWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary_weeks', function (Blueprint $table) {
            $table->id();
            $table->enum('week', [0,1, 2, 3, 4, 5, 6]);
            $table->foreignId('itinerary_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itinerary_weeks');
    }
}
