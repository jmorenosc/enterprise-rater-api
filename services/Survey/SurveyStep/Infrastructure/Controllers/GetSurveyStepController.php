<?php

namespace Services\Survey\SurveyStep\Infrastructure\Controllers;

use Services\Survey\SurveyStep\Infrastructure\Repositories\SurveyStepRepository;

class GetSurveyStepController
{

  public function __invoke(int $id)
  {
    try {
      $repopsitory = new SurveyStepRepository;
      return $repopsitory -> getSurveyStep($id, [ 'Childrens' ]);
      return ['get step survey'];
    } catch (\Throwable $th) {
      return response()
        -> json([
          "success" => false,
          "message" => $th -> getMessage(),
          "data" => []
        ], 403);
    }
  }

}