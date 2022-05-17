<?php

namespace Services\Question\Infrastructure\Controllers;

use Services\Question\Infrastructure\Repositories\QuestionEloquentRepository;
use Services\Question\Infrastructure\Requests\QuestionRequest;

class CreateQuestionController
{

  public function __invoke(QuestionRequest $request)
  {
    try {
      $repository = new QuestionEloquentRepository;
      return $question = $repository -> createQuestion($request -> only(
        'title', 
        'impact', 
        'type', 
        'multiple', 
        'required'),
        $request -> survey_steps
      );
      return $request -> all();
    } catch (\Throwable $th) {
      return response()
        -> json([
          'error' => $th -> getMessage()
        ], 403);
    }
  }

}