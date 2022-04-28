<?php

namespace Services\Enterprise\Application\UseCases;

class DeleteEnterprise
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

  public function __invoke()
  {
    $this -> model -> find($this -> id)
      -> delete();
  }

}