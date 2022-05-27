<?php

namespace Services\Survey\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Services\Enterprise\Infrastructure\Repositories\EnterpriseEloquentRepository;
use Services\Survey\Infrastructure\Repositories\SurveyEloquentRepository;

class SaveAppliedSurvey
{

  public function __invoke(Request $request)
  {
    try {
      $survey = new SurveyEloquentRepository;
      $enterprise = new EnterpriseEloquentRepository;
      $survey = $survey -> getSurvey($request -> survey_id);
      $enterprise = $enterprise -> getEnterprise($request -> enterprise_id);
      $survey -> AppliedSurveys() -> create([
        'enterprise_id' => $enterprise -> id,
        'data' => json_encode($request -> applied_survey)
      ]);
      $survey_applied = $survey -> AppliedSurveys() -> orderBy('id', 'desc') -> first();
      return response()
        -> json([
          'success' => true,
          'message' => 'La encuesta se ha guardado exitosamente',
          'data' => $survey_applied
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