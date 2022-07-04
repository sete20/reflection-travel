<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('interesting')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->foreignId('itinerary_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->foreignId('start_from_id')->nullable()->constrained('cities')->onDelete('SET NULL');
            $table->foreignId('start_to_id')->nullable()->constrained('cities')->onDelete('SET NULL');
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
        Schema::dropIfExists('tours');
    }
}
