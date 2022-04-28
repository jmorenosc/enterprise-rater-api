<?php

namespace Services\Enterprise\Application\UseCases;

class UpdateEnterprise
{

  /**
   * @var object
   */
  private $model;
  /**
   * @var array
   */
  private $data;
  /**
   * @var int
   */
  private $id;

  public function __construct(object $model, int $id, array $data) {
    $this->model = $model;
    $this->id = $id;
    $this->data = $data;
  }

  public function __invoke(): void
  {
    $this -> model -> find($this -> id)
    -> update($this -> data);
  }

}