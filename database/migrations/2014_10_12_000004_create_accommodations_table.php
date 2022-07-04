<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->enum('type', config('enum.accommodation_types'));
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('reservation_email')->nullable();
            $table->string('reservation_phone')->nullable();
            $table->string('reception_phone')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('accounting_phone')->nullable();
            $table->decimal('tourguide_night_fee', 10, 2)->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('accommodations');
    }
}
