<?php

namespace Services\Question\Infrastructure\Controllers;

use Services\Question\Infrastructure\Repositories\QuestionEloquentRepository;

class GetQuestionController
{

  public function __invoke(int $id)
  {
    try {
      $repository = new QuestionEloquentRepository;
      return $question = $repository -> getQuestion($id, [
        'SurveySteps', 'QuestionResponses' => function($q) {
          $q -> orderBy('position', 'asc');
        }
      ]);
    } catch (\Throwable $th) {
      return response()
        -> json([
          'error' => 'This resource does not exists'
        ], 404);
    }
  }
  
}
