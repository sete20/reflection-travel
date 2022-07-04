<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('duration')->nullable();
            $table->enum('duration_type', config('enum.step_duration_types'));
            $table->boolean('duration_approximate')->default(0);
            $table->foreignId('place_id')->nullable()->constrained();
            $table->foreignId('transport_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->foreignId('attendant_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->foreignId('permit_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('SET NULL');
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
        Schema::dropIfExists('steps');
    }
}
