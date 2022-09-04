<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('type');
            $table->string('images');
            $table->string('stars');
            $table->longText('about_hotel');
            $table->double('price_of_night');
            $table->tinyInteger('is_offer');
            $table->time('check_in');
            $table->time('check_out');
            $table->integer('region_id');
            $table->string('far_from_the_city_center');
            $table->longText('long')->nullable();
            $table->longText('lat')->nullable();
            $table->integer('views');
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
        Schema::dropIfExists('hotels');
    }
}
