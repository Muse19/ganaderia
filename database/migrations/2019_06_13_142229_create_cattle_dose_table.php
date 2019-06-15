<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCattleDoseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cattle_dose', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cattle_id');
            $table->unsignedBigInteger('dose_id');

            $table->dateTime('date');
            $table->timestamps();

            $table->foreign('cattle_id')->references('id')->on('cattle');
            $table->foreign('dose_id')->references('id')->on('doses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cattle_dose');
    }
}
