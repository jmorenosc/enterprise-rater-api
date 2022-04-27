<?php

namespace Services\Enterprise\Infrastructure\Repositories;

use App\Models\Enterprise;
use Services\Enterprise\Application\UseCases\CreateEnterprise;
use Services\Enterprise\Application\UseCases\GetEnterprise;
use Services\Enterprise\Domain\Contracts\EnterpriseContracts;

class EnterpriseEloquentRepository implements EnterpriseContracts
{
  /**
   * @var App\Models\Enterprise
   */
  private $model;

  public function __construct() {
    $this->model = new Enterprise;
  }

  public function createEnterprise(String $name): Enterprise
  {
    $use_case = new CreateEnterprise($this -> model, $name);
    return $use_case();
  }

  public function getEnterprise(Int $id): ?Enterprise
  {
    $use_case = new GetEnterprise($this -> model, $id);
    return $use_case();
  }

}