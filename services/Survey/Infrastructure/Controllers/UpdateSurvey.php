<?php

namespace Services\Survey\Infrastructure\Controllers;

use Services\Survey\Infrastructure\Repositories\SurveyEloquentRepository;
use Services\Survey\Infrastructure\Requests\UpdateSurvey as RequestsUpdateSurvey;

class UpdateSurvey
{

  public function __invoke(RequestsUpdateSurvey $request)
  {
    try {
      $repository = new SurveyEloquentRepository;
      $repository -> updateSurvey(
        $request -> id,
        $request -> name,
        $request -> description
      );
      
      $survey = $repository -> getSurvey($request -> id);
      if (count($request -> survey_steps) > 0) $survey -> SurveySteps() -> sync($request -> survey_steps);
      
      return response()
        -> json([
          'success' => true,
          'message' => 'The survey has been updated successfully',
          'data' => $request -> all()
        ], 201);
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