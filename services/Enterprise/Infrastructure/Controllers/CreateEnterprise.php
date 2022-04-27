<?php

namespace Services\Enterprise\Infrastructure\Controllers;

use Services\Enterprise\Infrastructure\Repositories\EnterpriseEloquentRepository;
use Services\Enterprise\Infrastructure\Requests\CreateEnterprise as RequestsCreateEnterprise;

class CreateEnterprise
{

  public function __invoke(RequestsCreateEnterprise $request)
  {
    try {
      $enterprise_repository = new EnterpriseEloquentRepository;
      $enterprise = $enterprise_repository -> createEnterprise($request -> name);
      return response() -> json([
        'success' => true,
        'message' => 'The enterprise has been created successfully',
        'data' => $enterprise
      ]);
    } catch (\Throwable $th) {
      return response()
        -> json([
          'error' => $th -> getMessage()
        ]);
    }
  }

}