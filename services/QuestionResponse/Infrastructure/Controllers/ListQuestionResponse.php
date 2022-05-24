<?php

namespace Services\QuestionResponse\Infrastructure\Controllers;

use Services\QuestionResponse\Infrastructure\Repositories\QuestionResponseEloquentRepository;
use Services\QuestionResponse\Infrastructure\Requests\ListQuestionResponse as RequestsListQuestionResponse;

class ListQuestionResponse
{

  public function __invoke(RequestsListQuestionResponse $request)
  {
    try {
      $repository = new QuestionResponseEloquentRepository;
      return response()
        -> json([
          'success' => false,
          'message' => null,
          'data' => $repository -> listResponses(
            $request -> only('per_page', 'param')
          )
        ], 200);
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