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

}