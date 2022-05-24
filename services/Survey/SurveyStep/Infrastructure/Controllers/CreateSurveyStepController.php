<?php

namespace Services\Survey\SurveyStep\Infrastructure\Controllers;

use Services\Survey\Infrastructure\Repositories\SurveyEloquentRepository;
use Services\Survey\SurveyStep\Infrastructure\Repositories\SurveyStepRepository;
use Services\Survey\SurveyStep\Infrastructure\Requests\SurveyStepRequest;

class CreateSurveyStepController
{

  public function __invoke(SurveyStepRequest $request)
  {
    try {
      $repository = new SurveyStepRepository;
      $step = $repository -> createSurveyStep($request -> only('name','description'));
      if ($request -> parent_id) $repository -> getSurveyStep($request -> parent_id) -> Childrens() -> attach($step);
      if ($request -> survey_id) 
      {
        $survey = new SurveyEloquentRepository;
        $survey = $survey -> getSurvey($request -> survey_id);
        $survey -> SurveySteps() -> attach($step);
      }
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