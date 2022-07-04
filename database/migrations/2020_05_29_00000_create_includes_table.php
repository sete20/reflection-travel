<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncludesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('includes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->enum('type', config('enum.include_types'));
            $table->enum('class', config('enum.include_classes'));
            $table->decimal('fee', 10, 2)->default(0);
            $table->decimal('adult_fee', 10, 2)->default(0);
            $table->decimal('child_fee', 10, 2)->default(0);
            $table->decimal('infant_fee', 10, 2)->default(0);
            $table->foreignId('city_id')->nullable()->constrained();
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
        Schema::dropIfExists('includes');
    }
}
