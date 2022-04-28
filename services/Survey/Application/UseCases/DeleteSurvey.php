<?php

namespace Services\Survey\Application\UseCases;

class DeleteSurvey
{

  /**
   * @var object
   */
  private $model;
  /**
   * @var int
   */
  private $id;

  public function __construct(object $model, int $id) {
    $this->model = $model;
    $this->id = $id;
  }

  public function __invoke(): void
  {
    $survey = $this -> model -> find($this -> id);
    $survey -> delete();
  }

}