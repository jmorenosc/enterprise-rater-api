<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('has_step', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_step_id') -> unsigned();
            $table->bigInteger('parent_id') -> unsigned();
            $table 
                -> foreign('parent_id')
                -> on('survey_steps')
                -> references('id')
                -> onDelete('restrict');
            $table 
                -> foreign('survey_step_id')
                -> on('survey_steps')
                -> references('id')
                -> onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('has_step');
    }
}
