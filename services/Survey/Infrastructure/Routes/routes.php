<?php

use Illuminate\Support\Facades\Route;

use Services\Survey\Infrastructure\Controllers\{
  CreateSurvey,
    DeleteSurvey,
    GetSurvey,
    ListSurveys,
    UpdateSurvey
};

use Services\Survey\SurveyStep\Infrastructure\Controllers\{
  CreateSurveyStepController,
  GetSurveyStepController,
  ListSurveyStepController,
  UpdateSurveyStepController
};

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateSurvey::class)->name('survey.create');
  Route::get('/{id}', GetSurvey::class)->name('survey.get');
  Route::put('/', UpdateSurvey::class)->name('survey.update');
  Route::delete('/{id}', DeleteSurvey::class)->name('survey.delete');
  Route::post('list', ListSurveys::class)->name('survey.delete');
});

Route::prefix('steps/api/v1')->group(function(){
  Route::post('/', CreateSurveyStepController::class) -> name('survey.step.create');
  Route::put('/', UpdateSurveyStepController::class) -> name('survey.step.update');
  Route::post('list', ListSurveyStepController::class) -> name('survey.step.list');
  Route::get('get/{id}', GetSurveyStepController::class) -> name('survey.step.get');
});