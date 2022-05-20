<?php

use Illuminate\Support\Facades\Route;
use Services\QuestionResponse\Infrastructure\Controllers\{
  CreateQuestionResponse,
  UpdateQuestionResponseController
};

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateQuestionResponse::class) -> name('create.response');
  Route::put('/', UpdateQuestionResponseController::class) -> name('update.response');
});