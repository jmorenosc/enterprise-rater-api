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
      return response()
        -> json([
          "success" => true,
          "message" => "",
          "data" => $enterprise
        ], 200);
    } catch (\Throwable $th) {
      return response()
        -> json([
          'success' => false,
          'message' => $th -> getMessage(),
          'data' => []
        ], 403);
    }
  }

}