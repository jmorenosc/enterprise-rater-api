<?php

namespace Services\Enterprise\Infrastructure\Controllers;

use Services\Enterprise\Infrastructure\Repositories\EnterpriseEloquentRepository;

class DeleteEnterprise
{

  public function __invoke(int $id)
  {
    try {
      $repository = new EnterpriseEloquentRepository;
      $repository -> deleteEnterprise($id);
      return response()
        -> json([
          "success" => true,
          "message" => "The enterprise has been deleted successfully",
          "data" => []
        ], 201);
    } catch (\Throwable $th) {
      return response()
        -> json([
          "success" => false,
          "message" => $th -> getMessage(),
          "data" => []
        ]);
    }
  }

}