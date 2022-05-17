<?php

namespace Services\Survey\SurveyStep\Application\UseCases;

final class UpdateSurveyStep
{

  /**
   * @var object
   */
  private $repository;

  public function __construct(object $repository) {
    $this->repository = $repository;
  }

  public function __invoke(array $data)
  {
    $step = $this -> repository -> find($data['id']);
    $step -> update([
      'name' => $data['name'],
      'description' => $data['description']
    ]);
    return $step;
  }

}