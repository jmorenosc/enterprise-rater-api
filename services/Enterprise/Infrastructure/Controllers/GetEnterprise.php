<?php

namespace Services\Enterprise\Infrastructure\Controllers;

use Services\Enterprise\Infrastructure\Repositories\EnterpriseEloquentRepository;
use Services\Enterprise\Infrastructure\Requests\GetEnterprise as RequestsGetEnterprise;

class GetEnterprise
{

  public function __invoke(RequestsGetEnterprise $request)
  {
    try {
      $repository = new EnterpriseEloquentRepository;
      $enterprise = $repository -> getEnterprise($request -> id, $request -> relations);
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