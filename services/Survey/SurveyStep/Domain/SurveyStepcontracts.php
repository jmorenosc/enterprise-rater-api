<?php

namespace Services\Survey\SurveyStep\Domain;

interface SurveyStepcontracts
{

  /**
   * @method to create new survey steep
   * @return object instance of  SurveySteep
   */
  public function createSurveyStep(Array $data): Object;

  /**
   * Update data for surveystep
   * @method updateSurveyStep
   */
  public function updateSurveyStep(Array $data): Object;

  /**
   * List and paginate steps
   * @method listSurveyStep
   */
  public function listSurveyStep(Array $data): Object;  

  /**
   * @method getSurveyStep
   */
  public function getSurveyStep(int $id, array $relations = []): ?Object;

}