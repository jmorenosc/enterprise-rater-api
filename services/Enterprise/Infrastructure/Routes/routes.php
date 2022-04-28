<?php

use Illuminate\Support\Facades\Route;
use Services\Enterprise\Infrastructure\Controllers\{
  SyncSurveys,
  CreateEnterprise,
  DeleteEnterprise,
  GetEnterprise,
  ListEnterprises,
  UpdateEnterprise
};

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateEnterprise::class)->name('enterprise.create');
  Route::post('/get', GetEnterprise::class)->name('enterprise.get');
  Route::post('list', ListEnterprises::class)->name('enterprise.list');
  Route::put('/', UpdateEnterprise::class)->name('enterprise.update');
  Route::delete('/{id}', DeleteEnterprise::class)->name('enterprise.delete');
  Route::put('surveys', SyncSurveys::class)->name('enterprise.sync.surveys');
});
