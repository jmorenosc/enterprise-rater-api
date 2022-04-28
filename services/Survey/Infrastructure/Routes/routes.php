<?php

use Illuminate\Support\Facades\Route;
use Services\Survey\Infrastructure\Controllers\{
  CreateSurvey,
    DeleteSurvey,
    GetSurvey,
    UpdateSurvey
};

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateSurvey::class)->name('survey.create');
  Route::get('/{id}', GetSurvey::class)->name('survey.get');
  Route::put('/', UpdateSurvey::class)->name('survey.update');
  Route::delete('/{id}', DeleteSurvey::class)->name('survey.delete');
});
