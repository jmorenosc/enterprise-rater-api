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

  public function __construct(Object $model, int $id) {
    $this->model = $model;
    $this->id = $id;
  }

  public function __invoke(): ?object
  {
    return $this -> model -> find($this -> id);
  }

}