<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionQuestionResponses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_question_responses', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('question_id')->constrained();
            $table -> foreignId('question_response_id')->constrained();
            $table -> integer('position') -> nullable(true) -> default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_question_responses');
    }
}
