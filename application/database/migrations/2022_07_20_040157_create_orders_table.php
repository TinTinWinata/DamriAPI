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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('id')->on('buses');

            $table->unsignedBigInteger("driver_id");
            $table->foreign('driver_id')->references('id')->on('drivers');

            $table->string('contact_name');
            $table->string('contact_phone');
            $table->date("start_rent_date");
            $table->integer('total_rent_days');
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
        Schema::dropIfExists('orders');
    }
};
