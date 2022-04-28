<?php

namespace Services\Survey\Domain\Contracts;

interface SurveyContracts
{

  /**
   * Method to create a new survey
   * You should send an name and description survey
   * @method createSurvey
   * @param string $name 
   * @param string $description 
   */
  public function createSurvey(string $name, string $description): Object;
  
  /**
   * Method to get survey with relations
   * To get survey with relations send array relations
   * @method getSurvey
   * @param int $id
   * @param array $relations
   * @return object
   */
  public function getSurvey(int $id, array $relations = []): Object;

  /**
   * Update survey data
   * @method updateSurvey
   * @param int $id
   * @param string $name
   * @param string $description
   * @return void
   */
  public function updateSurvey(int $id, string $name, string $description): void;

}