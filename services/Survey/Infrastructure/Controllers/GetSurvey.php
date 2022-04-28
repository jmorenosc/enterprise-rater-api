<?php

namespace Services\Survey\Infrastructure\Controllers;

use Services\Survey\Infrastructure\Repositories\SurveyEloquentRepository;

class GetSurvey
{

  public function __invoke(int $id)
  {
    try {
      $repository = new SurveyEloquentRepository;
      return response()
        -> json([
          'success' => false,
          'message' => null,
          'data' => $repository -> getSurvey($id)
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