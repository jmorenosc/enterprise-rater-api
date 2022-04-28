<?php

use Illuminate\Support\Facades\Route;
use Services\Survey\Infrastructure\Controllers\CreateSurvey;
use Services\Survey\Infrastructure\Controllers\GetSurvey;

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateSurvey::class)->name('survey.create');
  Route::get('/{id}', GetSurvey::class)->name('survey.get');
});
