<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedlots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cattle_id');
            $table->unsignedBigInteger('lot_id');

            $table->decimal('weight', 5, 2);
            $table->dateTime('date');
            $table->timestamps();

            $table->foreign('cattle_id')->references('id')->on('cattle');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedlots');
    }
}
