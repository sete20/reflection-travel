<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->decimal('limousine_price', 8, 2);
            $table->decimal('hiace_price', 8, 2);
            $table->decimal('coaster_price', 8, 2);
            $table->decimal('coach_price', 8, 2);
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
        Schema::dropIfExists('transports');
    }
}
