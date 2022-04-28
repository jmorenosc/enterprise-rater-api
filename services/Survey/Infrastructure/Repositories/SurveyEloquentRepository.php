<?php

namespace Services\Survey\Infrastructure\Repositories;

use App\Models\Survey;
use Services\Survey\Application\UseCases\CreateSurvey;
use Services\Survey\Application\UseCases\DeleteSurvey;
use Services\Survey\Application\UseCases\GetSurvey;
use Services\Survey\Application\UseCases\ListSurveys;
use Services\Survey\Application\UseCases\UpdateSurvey;
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

  public function getSurvey(int $id, array $relations = []): Survey
  {
    $use_case = new GetSurvey($this -> model, $id, $relations);
    return $use_case();
  }

  public function updateSurvey(int $id, string $name, string $description): void
  {
    $use_case = new UpdateSurvey($this -> model, $id, $name, $description);
    $use_case();
  }

  public function deleteSurvey(int $id): void
  {
    $use_case = new DeleteSurvey($this -> model, $id);
    $use_case();
  }

  public function listSurveys(int $per_page, string $order = 'asc', ?string $param = null, ?bool $trashed = null): Object
  {
    $use_case = new ListSurveys($this -> model, $per_page, $order, $param, $trashed);
    return $use_case();
  }

}