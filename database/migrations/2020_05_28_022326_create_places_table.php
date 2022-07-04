<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->decimal('adult_fee', 10, 2)->default(0);
            $table->decimal('child_fee', 10, 2)->default(0);
            $table->decimal('infant_fee', 10, 2)->default(0);
            $table->decimal('arab_adult_fee', 10, 2)->default(0);
            $table->decimal('arab_child_fee', 10, 2)->default(0);
            $table->decimal('arab_infant_fee', 10, 2)->default(0);
            $table->decimal('egyptian_adult_fee', 10, 2)->default(0);
            $table->decimal('egyptian_child_fee', 10, 2)->default(0);
            $table->decimal('egyptian_infant_fee', 10, 2)->default(0);
            $table->float('latitude', 10, 6)->nullable();
            $table->float('longitude', 10, 6)->nullable();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('blog_id')->nullable()->constrained();
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
        Schema::dropIfExists('places');
    }
}
