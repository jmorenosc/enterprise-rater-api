<?php

namespace Services\Question\Infrastructure\Controllers;

use Services\Question\Infrastructure\Repositories\QuestionEloquentRepository;
use Services\Question\Infrastructure\Requests\QuestionRequest;

class UpdateQuestionController
{

  public function __invoke(QuestionRequest $request)
  {
    try {
      $repository = new QuestionEloquentRepository;
      $question = $repository -> updateQuestion($request -> only(
        'id',
        'title',
        'impact',
        'type',
        'multiple',
        'required',
      ), 
      $request -> survey_steps,
      $request -> question_responses);
      return $question;
    } catch (\Throwable $th) {
      return response()
        -> json([
          'error' => $th -> getMessage()
        ], 403);
    }
  }

}