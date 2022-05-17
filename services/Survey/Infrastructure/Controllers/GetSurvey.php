<?php

namespace Services\Survey\Infrastructure\Controllers;

use Services\Survey\Infrastructure\Repositories\SurveyEloquentRepository;

class GetSurvey
{

  public function __invoke(int $id)
  {
    try {
      $repository = new SurveyEloquentRepository;
      $survey = $repository -> getSurvey($id, ['SurveySteps' => function($q){
        $q -> with([
          'Childrens' => function($s){
            $s -> orderBy('has_step.id', 'asc')
            -> with(['Questions' => function($questions){
              $questions -> orderby('position', 'asc');
            }]);
          }, 
          'Questions' => function($q){
            $q -> orderBy('position', 'asc');
          }
        ]);
      }]);
      return response()
        -> json([
          'success' => true,
          'message' => null,
          'data' => $survey,
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