<?php

namespace Services\Survey\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Services\Survey\Infrastructure\Repositories\AppliedSurveyEloquentRepository;

class GetAppliedSurvey
{

  public function __invoke(Request $request, $id)
  {
    try {
      $repository = new AppliedSurveyEloquentRepository;
      $survey = $repository -> get($id, [
        'Survey',
        'Enterprise'
      ]);
      return response()
        -> json([
          'success' => true,
          'message' => null,
          'data' => $survey
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
