<?php

namespace Services\Survey\Infrastructure\Repositories;

use App\Models\AppliedSurvey;

class AppliedSurveyEloquentRepository
{

  /**
   * @var object
   */
  private $model;

  public function __construct() {
    $this -> model = new AppliedSurvey();
  }

  public function get(int $id, array $relations = [])
  {
    return $this -> model
     -> when(count($relations) > 0, function($q) use($relations){
       $q -> with($relations);
     })
     -> find($id);
  }
  
}
