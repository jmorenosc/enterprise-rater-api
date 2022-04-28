<?php

use Illuminate\Support\Facades\Route;
use Services\Survey\Infrastructure\Controllers\CreateSurvey;

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateSurvey::class)->name('survey.create');
});
