<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitizensTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 25)->nullable();
            $table->string('surname', 25);
            $table->string('father_name', 25);
            $table->string('mother_name', 25);
            $table->date('birthdate');
            $table->string('gender', 5);
            $table->string('personal_no', 10)->unique('personal_no');
            $table->string('maritial_status', 25);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('citizens');
    }

}
