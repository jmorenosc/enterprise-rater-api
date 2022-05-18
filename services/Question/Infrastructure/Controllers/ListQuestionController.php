<?php

namespace Services\Question\Infrastructure\Controllers;

use Services\Question\Infrastructure\Repositories\QuestionEloquentRepository;
use Services\Question\Infrastructure\Requests\ListQuestionRequest;

class ListQuestionController
{

  public function __invoke(ListQuestionRequest $request)
  {
    try {
      $repository = new QuestionEloquentRepository;
      return $repository -> listQuestions($request -> per_page, $request -> param);
      return $request -> all();
    } catch (\Throwable $th) {
      return response()
        -> json([
          'error' => $th -> getMessage()
        ], 403);
    }
  }

}