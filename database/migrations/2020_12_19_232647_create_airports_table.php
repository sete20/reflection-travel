<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->time('take_off_hour');
            $table->time('arrival_time');
            $table->decimal('child_price', 8, 2);
            $table->decimal('adult_price', 8, 2);
            $table->decimal('infant_price', 8, 2);
            $table->foreignId('pickup_city_id')->nullable()->constrained('cities')->onDelete('SET NULL');
            $table->foreignId('drop_off_city_id')->nullable()->constrained('cities')->onDelete('SET NULL');
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
        Schema::dropIfExists('airports');
    }
};
