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
    $enterprise = $this -> model
    -> when(count($this ->relations) > 0, function($q){
      $q -> with($this -> relations);
    })
    -> find($this -> id);
    return $enterprise;
  }

}