<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradesheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->string('lastname');
            $table->string('firstname');
            $table->string('course');
            $table->string('midterm');
            $table->string('final');
            $table->string('semestral_equivalent');
            $table->string('semestral_grade');
            $table->integer('semester');
            $table->string('year');
            $table->string('remarks');
            $table->string('subject_code');
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
        Schema::dropIfExists('gradesheets');
    }
}
