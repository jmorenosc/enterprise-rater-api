<?php

namespace Services\Survey\SurveyStep\Infrastructure\Repositories;

use App\Models\SurveyStep;

use Services\Survey\SurveyStep\Application\UseCases\CreateSurveyStep;
use Services\Survey\SurveyStep\Application\UseCases\GetSurveyStep;
use Services\Survey\SurveyStep\Application\UseCases\ListSurveySteps;
use Services\Survey\SurveyStep\Application\UseCases\UpdateSurveyStep;
use Services\Survey\SurveyStep\Domain\SurveyStepcontracts;

class SurveyStepRepository implements SurveyStepcontracts
{
  /**
   * @var object
   */
  private $service;

  public function __construct() {
    $this->service = new SurveyStep();
  }

  /**
   * @method to create new survey steep
   * @param array $data{
   * @type string $name
   * @type ?string $description
   * @type ?integer $order
   * @type ?integer $parent_id
   * }
   * @return object instance of  SurveySteep
   */
  public function createSurveyStep(Array $data): SurveyStep
  {
    $use_case = new CreateSurveyStep($this ->service);
    $step = $use_case($data);
    return $step;
  }

  /**
   * Update data for surveystep
   * @method updateSurveyStep
   * @param array $data{
   * @type string $name
   * @type ?string $description
   * @type ?integer $order
   * @type ?integer $parent_id
   * }
   * @return object instance of  SurveySteep
   */
  public function updateSurveyStep(Array $data): SurveyStep
  {
    $use_case = new UpdateSurveyStep($this -> service);
    return $use_case($data);
  }

  public function listSurveyStep(Array $data): Object
  {
    $use_case = new ListSurveySteps($this -> service);
    return $use_case($data);
  }

  /**
   * @method getSurveyStep
   */
  public function getSurveyStep(int $id, array $relations = []): ?SurveyStep
  {
    $use_case = new GetSurveyStep($this -> service);
    return $use_case($id, $relations);
  }
  
}
