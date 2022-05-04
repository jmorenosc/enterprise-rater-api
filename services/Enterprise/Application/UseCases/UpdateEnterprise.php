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
  private $enterprise;

  public function __construct(object $model, array $enterprise) {
    $this->model = $model;
    $this->enterprise = $enterprise;
  }

  public function __invoke(): void
  {
    $this -> model -> find($this -> enterprise['id'])
    -> update([
      'name' => $this -> enterprise['name'],
      'email' => $this -> enterprise['email'],
      'phone' => $this -> enterprise['phone'],
      'rfc' => $this -> enterprise['rfc']
    ]);
  }

}