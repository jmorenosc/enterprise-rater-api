<?php

namespace services\Survey\Infrastructure\Controllers;

use Services\Survey\Infrastructure\Repositories\SurveyEloquentRepository;
use Services\Survey\Infrastructure\Requests\ListSurveys as RequestsListSurveys;

class ListSurveys
{

  public function __invoke(RequestsListSurveys $request)
  {
    try {
      $repository = new SurveyEloquentRepository;
      return $repository -> listSurveys(
        $request -> per_page,
        $request -> order,
        $request -> param,
        $request -> trashed);
    } catch (\Throwable $th) {
      return response()
        ->json([
          'success' => false,
          'message' => $th->getMessage(),
          'data' => []
        ], 403);
    }
  }
}
