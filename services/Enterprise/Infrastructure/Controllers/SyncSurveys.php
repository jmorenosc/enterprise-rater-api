<?php

namespace Services\Enterprise\Infrastructure\Controllers;

use Services\Enterprise\Infrastructure\Repositories\EnterpriseEloquentRepository;
use Services\Enterprise\Infrastructure\Requests\SyncSurveys as RequestsSyncSurveys;

 class SyncSurveys
 {

  public function __invoke(RequestsSyncSurveys $request)
  {
    try {
      $repository = new EnterpriseEloquentRepository;
      $enterprise = $repository -> getEnterprise($request -> id);
      $repository -> syncSurveys($enterprise, $request -> surveys);
      return response()
        -> json([
          'success' => false,
          'message' => 'The new surveys has been added successfully',
          'data' => $enterprise
        ]);
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