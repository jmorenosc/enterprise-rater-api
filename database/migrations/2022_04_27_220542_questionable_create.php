<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionable', function (Blueprint $table) {
            $table->id();
            $table->string('questionable_type');
            $table->bigInteger('questionable_id')->unsigned();
            $table->foreignId('question_id')->constrained();
            $table->integer('position')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
