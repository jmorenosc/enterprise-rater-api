<?php

namespace Services\Survey\SurveyStep\Application\UseCases;

final class CreateSurveyStep
{

  /**
   * @var object
   */
  private $repository;

  public function __construct(Object $repository) {
    $this->repository = $repository;
  }

  /**
   * @param array $data {
   * @type string name
   * @type string description
   * @type string order
   * @type ?integer parent_id
   * }
   */
  public function __invoke($data):object
  {
    return $this 
      -> repository 
      -> create($data);
  }

}