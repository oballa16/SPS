<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases_citizens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('case_id');
            $table->bigInteger('citizen_id');

            $table->foreign('case_id')->references('id')->on('cases');
            $table->foreign('citizen_id')->references('id')->on('citizens');
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
        Schema::dropIfExists('cases_citizens');
    }
}
