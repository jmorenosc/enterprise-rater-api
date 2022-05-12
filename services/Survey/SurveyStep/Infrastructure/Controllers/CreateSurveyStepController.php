<?php

namespace Services\Survey\SurveyStep\Infrastructure\Controllers;

use Services\Survey\SurveyStep\Infrastructure\Repositories\SurveyStepRepository;
use Services\Survey\SurveyStep\Infrastructure\Requests\SurveyStepRequest;

class CreateSurveyStepController
{

  public function __invoke(SurveyStepRequest $request)
  {
    try {
      $repository = new SurveyStepRepository;
      $step = $repository -> createSurveyStep($request -> only('name','description', 'order', 'parent_id'));
      return response()
        -> json([
          'success' => true,
          'message' => 'The step has been created successfully',
          'data' => $step
        ]);
    } catch (\Throwable $th) {
      return response()
        -> json([
          'success' => false,
          'message' => $th -> getMessage(),
          'errors' => null
        ]);
    }
  }

}