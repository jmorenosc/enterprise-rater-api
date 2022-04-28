<?php

namespace Services\Survey\Application\UseCases;

class CreateSurvey
{

  /**
   * @var object
   */
  private $model;
  /**
   * @var string
   */
  private $name, $description;

  public function __construct(object $model, string $name, string $description) {
    $this->model = $model;
    $this -> name = $name;
    $this -> description = $description;
  }

  public function __invoke(): object
  {
    return $this -> model
      -> create([
        'name' => $this -> name,
        'description' => $this -> description
      ]);
  }

}