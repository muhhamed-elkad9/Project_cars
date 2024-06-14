<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('company_name_made');
            $table->date('car_year_buy');
            $table->string('car_number');
            $table->string('car_number_serial');
            $table->string('car_year_made');
            $table->integer('car_age');
            $table->integer('traveled_distance');
            $table->integer('car_value_buy');
            $table->string('current_value');
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
        Schema::dropIfExists('cars');
    }
}
