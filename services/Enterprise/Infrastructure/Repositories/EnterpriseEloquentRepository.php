<?php

namespace Services\Enterprise\Infrastructure\Repositories;

use App\Models\Enterprise;
use Services\Enterprise\Application\UseCases\{
  CreateEnterprise,
    DeleteEnterprise,
    GetEnterprise,
    ListEnterprises,
    SyncSurveys,
    UpdateEnterprise
};
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

  public function createEnterprise(Array $enterprise): Enterprise
  {
    $use_case = new CreateEnterprise($this -> model, $enterprise);
    return $use_case();
  }

  public function getEnterprise(Int $id, Array $relations = []): ?Enterprise
  {
    $use_case = new GetEnterprise($this -> model, $id, $relations);
    return $use_case();
  }

  public function updateEnterprise(Array $enterprise):void
  {
    $use_case = new UpdateEnterprise($this -> model, [
      'id' => $enterprise['id'],
      'name' => $enterprise['name'],
      'email' => $enterprise['email'],
      'phone' => $enterprise['phone'],
      'rfc' => $enterprise['rfc']
    ]);
    $use_case();
  }

  public function deleteEnterprise($id): void
  {
    $use_case = new DeleteEnterprise($this -> model, $id);
    $use_case();
  }

  public function listEnterprises(?int $per_page = 50, ?string $order = 'asc', ?string $param = null, ?bool $trashed = false): object
  {
    $use_case = new ListEnterprises(
      $this -> model,
      $per_page,
      $order,
      $param,
      $trashed);
    return $use_case();
  }

  public function syncSurveys(Object $enterprise, Array $surveys): void
  {
    $use_case = new SyncSurveys($enterprise, $surveys);
    $use_case();
  }

}