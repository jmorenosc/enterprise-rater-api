<?php

namespace Services\Survey\SurveyStep\Infrastructure\Controllers;

use Services\Survey\SurveyStep\Infrastructure\Repositories\SurveyStepRepository;
use Services\Survey\SurveyStep\Infrastructure\Requests\SurveyStepListRequest;

class ListSurveyStepController
{

  public function __invoke(SurveyStepListRequest $request)
  {
    try {
      $repository = new SurveyStepRepository;
      return $repository -> listSurveyStep($request -> only('param', 'per_page'));
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