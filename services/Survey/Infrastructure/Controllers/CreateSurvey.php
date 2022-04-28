<?php

namespace Services\Survey\Infrastructure\Controllers;

use Services\Survey\Infrastructure\Repositories\SurveyEloquentRepository;
use Services\Survey\Infrastructure\Requests\CreateSurvey as RequestsCreateSurvey;

class CreateSurvey
{

  public function __invoke(RequestsCreateSurvey $request)
  {
    try {
      $repository =  new SurveyEloquentRepository;
      return response()
       -> json([
        'success' => false,
        'message' => 'The survey has been created successfully',
        'data' => $repository -> createSurvey(
          $request -> name,
          $request -> description )
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