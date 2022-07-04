<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->foreignId('breakfast_id')->nullable()->constrained('includes')->onDelete('SET NULL');
            $table->foreignId('lunch_id')->nullable()->constrained('includes')->onDelete('SET NULL');
            $table->foreignId('dinner_id')->nullable()->constrained('includes')->onDelete('SET NULL');
            $table->foreignId('city_id')->constrained();
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
        Schema::dropIfExists('days');
    }
}
