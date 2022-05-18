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
    if (isset($data['childrens'])) $this -> syncChildrens($step, $data['childrens']);
    if (isset($data['questions'])) $this -> syncQuestions($step, $data['questions']);
    return $step;
  }

  private function syncChildrens(object $step, array $childrens): void
  {
    $step -> Childrens() -> sync($childrens);
  }

  private function syncQuestions(object $step, array $questions): void
  {
    $q = [];
    foreach ($questions as $question) {
      $q[$question['id']] = ['position' => $question['position']];
    }
    $step -> Questions() -> sync($q);
  }

}