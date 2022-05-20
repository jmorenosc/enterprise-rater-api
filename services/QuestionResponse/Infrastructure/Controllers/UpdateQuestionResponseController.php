<?php

namespace Services\QuestionResponse\Infrastructure\Controllers;

use Services\QuestionResponse\Infrastructure\Repositories\QuestionResponseEloquentRepository;
use Services\QuestionResponse\Infrastructure\Requests\QuestionResponse;

class UpdateQuestionResponseController
{

  public function __invoke(QuestionResponse $request)
  {
    try {
      $repository =  new QuestionResponseEloquentRepository;
      $repository -> updateResponse($request -> only('title', 'id', 'value', 'questions'));
      return response()
        -> json([
          'success' => true,
          'message' => 'Response updated successfully',
          'data' => []
        ]);
    } catch (\Throwable $th) {
      return response()
        -> json([
          'success' => false,
          'message' => $th -> getMessage(),
          'data' => []
        ], 403);
    }
  }

}