<?php

namespace Services\Enterprise\Application\UseCases;

class CreateEnterprise
{
  /**
   * @var object
   */
  private $repository;
  /**
   * @var array
   */
  private $enterprise;

  public function __construct(Object $repository, Array $enterprise) {
    $this->repository = $repository;
    $this->enterprise = $enterprise;
  }

  /**
   * @return object
   */
  public function __invoke():object
  {
    $enterprise = $this -> repository -> create($this -> enterprise);
    return $enterprise;
  }

}