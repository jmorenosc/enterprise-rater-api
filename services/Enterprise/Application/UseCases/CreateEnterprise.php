<?php

namespace Services\Enterprise\Application\UseCases;

class CreateEnterprise
{
  /**
   * @var object
   */
  private $repository;
  /**
   * @var string
   */
  private $name;

  public function __construct(Object $repository, String $name) {
    $this->repository = $repository;
    $this->name = $name;
  }

  /**
   * @return object
   */
  public function __invoke():object
  {
    $enterprise = $this -> repository -> create([
      'name' => $this -> name
    ]);
    return $enterprise;
  }

}