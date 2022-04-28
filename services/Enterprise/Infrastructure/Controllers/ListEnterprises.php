<?php

namespace Services\Enterprise\Infrastructure\Controllers;

use Services\Enterprise\Infrastructure\Repositories\EnterpriseEloquentRepository;
use Services\Enterprise\Infrastructure\Requests\ListEnterprises as RequestsListEnterprises;

class ListEnterprises
{

  public function __invoke(RequestsListEnterprises $request)
  {
    try {
      $repository = new EnterpriseEloquentRepository;
      return $repository -> listEnterprises(
        $request -> per_page,
        $request->order,
        $request -> param,
        $request -> trashed);
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