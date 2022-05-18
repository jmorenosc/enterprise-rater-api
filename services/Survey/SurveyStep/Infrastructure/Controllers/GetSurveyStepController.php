<?php

namespace Services\Survey\SurveyStep\Infrastructure\Controllers;

use Services\Survey\SurveyStep\Infrastructure\Repositories\SurveyStepRepository;

class GetSurveyStepController
{

  public function __invoke(int $id)
  {
    try {
      $repopsitory = new SurveyStepRepository;
      return $repopsitory -> getSurveyStep($id, [ 
        'Childrens' => function($q) {
          $q
            -> with(['questions']) 
            -> orderBy('has_step.id', 'asc');
        }, 
        'Questions' => function($q) {
          return $q -> orderBy('position', 'asc');
        }
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