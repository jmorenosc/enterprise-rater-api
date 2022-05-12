<?php

namespace Services\Survey\SurveyStep\Application\UseCases;

final class GetSurveyStep
{

  /**
   * @var object
   */
  private $repository;

  public function __construct($repository) {
    $this->repository = $repository;
  }

  public function __invoke(int $id, $relations = [])
  {
    try {
      $step = $this -> repository
        -> when($relations, function($q) use($relations) {
          $q -> with($relations);
        })
        -> find($id);
      return $step;
    } catch (\Throwable $th) {
      throw new \Exception("Este elemento no existe");
    }
  }

}