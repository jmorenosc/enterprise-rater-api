<?php

namespace Services\Survey\Application\UseCases;

class UpdateSurvey
{

  /**
   * @var object
   */
  private $model;
  /**
   * @var string
   */
  private $name, $description;
  /**
   * @var int
   */
  private $id;

  public function __construct(object $model, int $id, string $name, string $description) {
    $this->model = $model;
    $this -> id = $id;
    $this -> name = $name;
    $this -> description = $description;
  }

  public function __invoke(): void
  {
    $this -> model -> find($this -> id)
      -> update([
        'name' => $this -> name,
        'description' => $this -> description
      ]);
  }

}