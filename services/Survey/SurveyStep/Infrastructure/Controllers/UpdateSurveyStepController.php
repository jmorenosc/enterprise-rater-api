<?php

namespace Services\Survey\SurveyStep\Infrastructure\Controllers;

use Services\Survey\SurveyStep\Infrastructure\Repositories\SurveyStepRepository;
use Services\Survey\SurveyStep\Infrastructure\Requests\SurveyStepRequest;

class UpdateSurveyStepController
{

  public function __invoke(SurveyStepRequest $request)
  {
    try {
      $repository = new SurveyStepRepository;
      $updated = $repository 
        -> updateSurveyStep($request -> only('id', 'name', 'description', 'order', 'parent_id'));
      return response()
        -> json([
          "success" => true,
          "message" => 'The step has been updated successfully',
          "data" => $updated
        ]);
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