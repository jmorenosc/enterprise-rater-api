<?php

namespace Services\Survey\Infrastructure\Repositories;

use App\Models\Survey;
use Services\Survey\Application\UseCases\CreateSurvey;
use Services\Survey\Domain\Contracts\SurveyContracts;

class SurveyEloquentRepository implements SurveyContracts
{

  /**
   * @var App\Models\Survey
   */
  private $model;

  public function __construct() {
    $this->model = new Survey;
  }

  public function createSurvey(string $name, string $description): Survey
  {
    $use_case = new CreateSurvey($this -> model, $name, $description);
    return $use_case();
  }

}