<?php

use Illuminate\Support\Facades\Route;
use Services\Question\Infrastructure\Controllers\{
  CreateQuestionController,
  GetQuestionController,
  ListQuestionController,
  UpdateQuestionController
};

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateQuestionController::class) -> name('create.question');
  Route::put('/', UpdateQuestionController::class) -> name('update.question');
  Route::get('/get/{id}', GetQuestionController::class) -> name('get.question');
  Route::post('list', ListQuestionController::class) -> name('list.questions');
});