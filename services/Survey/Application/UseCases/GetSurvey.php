<?php

namespace Services\Survey\Application\UseCases;

class GetSurvey
{

  /**
   * @var object
   */
  private $model;
  /**
   * @var int
   */
  private $id;
  /**
   * @var array
   */
  private $relations;

  public function __construct(object $model, int $id, array $relations) {
    $this->model = $model;
    $this->id = $id;
    $this->relations = $relations;
  }

  public function __invoke()
  {
    try {
      $survey = $this -> model
        ->when($this -> relations, function($q) {
          return $q -> with($this -> relations);
        })
        -> find($this -> id);
      return $survey;
    } catch (\Throwable $th) {
      throw new \Exception($th -> getMessage());
    }
  }

}