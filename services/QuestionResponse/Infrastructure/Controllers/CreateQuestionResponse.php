<?php

namespace Services\QuestionResponse\Infrastructure\Controllers;

use Services\QuestionResponse\Infrastructure\Repositories\QuestionResponseEloquentRepository;
use Services\QuestionResponse\Infrastructure\Requests\QuestionResponse;

class CreateQuestionResponse
{

  public function __invoke(QuestionResponse $request)
  {

    try {
      $repository = new QuestionResponseEloquentRepository;
      $response = $repository -> createResponse($request -> only('title', 'value', 'questions'));
      return response()
        -> json([
          'success' => true,
          'message' => 'La pregunta se ga creado exitosamente',
          'data' => $response
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