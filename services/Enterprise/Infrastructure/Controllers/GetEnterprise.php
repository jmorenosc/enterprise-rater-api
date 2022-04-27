<?php

namespace Services\Enterprise\Infrastructure\Controllers;

use Services\Enterprise\Infrastructure\Repositories\EnterpriseEloquentRepository;

class GetEnterprise
{

  public function __invoke(int $id)
  {
    try {
      $repository = new EnterpriseEloquentRepository;
      $enterprise = $repository -> getEnterprise($id);
      return $enterprise;
    } catch (\Throwable $th) {
      return response()
        -> json([
          'success' => false,
          'message' => $th -> getMessage(),
          'data' => []
        ]);
    }
  }

}