<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCattleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cattle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('lot_id')->nullable();
            $table->unsignedBigInteger('race_id');

            $table->integer('number')->unique();
            $table->date('birth_date');
            $table->enum('gender', ['M', 'H']);
            $table->decimal('weight', 5, 2);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('lot_id')->references('id')->on('lots');
            $table->foreign('race_id')->references('id')->on('races');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cattle');
    }
}
