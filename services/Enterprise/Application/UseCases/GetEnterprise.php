<?php

namespace Services\Enterprise\Application\UseCases;

class GetEnterprise
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

  public function __construct(Object $model, int $id, array $relations) {
    $this->model = $model;
    $this->id = $id;
    $this->relations = $relations;
  }

  public function __invoke(): ?object
  {
    $enterprise = $this -> model -> find($this -> id);
    if (in_array('Surveys', $this -> relations)) $enterprise -> Surveys;
    return $enterprise;
  }

}