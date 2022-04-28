<?php

namespace Services\Survey\Infrastructure\Controllers;

use Services\Survey\Infrastructure\Repositories\SurveyEloquentRepository;

class DeleteSurvey
{

  public function __invoke(int $id)
  {
    try {
      $repository = new SurveyEloquentRepository;
      $repository -> deleteSurvey($id);
      return response()
        -> json([
          'success' => false,
          'message' => 'This survey has been deleted successfully',
          'data' => []
        ], 403);
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