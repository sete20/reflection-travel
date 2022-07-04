<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodation_prices', function (Blueprint $table) {
            $table->id();
            $table->enum('season', config('enum.seasons'));
            $table->decimal('single', 10, 2)->default(0);
            $table->decimal('double', 10, 2)->default(0);
            $table->decimal('trible', 10, 2)->default(0);
            $table->foreignId('accommodation_id')->constrained()->onDelete('cascade');
            $table->foreignId('view_id')
                    ->nullable()
                    ->constrained();
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
        Schema::dropIfExists('accommodation_prices');
    }
}
