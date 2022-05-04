<?php

namespace Services\Enterprise\Infrastructure\Controllers;

use Services\Enterprise\Infrastructure\Repositories\EnterpriseEloquentRepository;
use Services\Enterprise\Infrastructure\Requests\Enterprise;

class UpdateEnterprise
{

  public function __invoke(Enterprise $request)
  {
    try {
      $repository = new EnterpriseEloquentRepository;
      $repository -> updateEnterprise(
        $request -> only('id', 'name', 'email', 'phone', 'rfc')
      );
      $enterprise = $repository -> getEnterprise($request -> id);
      return response()
        -> json([
          "success" => true,
          "message" => "The enterprise has been updated successfully",
          "data" => $enterprise
        ]);
    } catch (\Throwable $th) {
      return response()
        -> json([
          "success" => false,
          "message" => $th -> getMessage(),
          "data" => []
        ], 403);
    }
  }

}