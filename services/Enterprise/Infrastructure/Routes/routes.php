<?php

use Illuminate\Support\Facades\Route;
use Services\Enterprise\Infrastructure\Controllers\{
  CreateEnterprise,
  DeleteEnterprise,
  GetEnterprise,
  ListEnterprises,
  UpdateEnterprise
};

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateEnterprise::class)->name('enterprise.create');
  Route::get('/{id}', GetEnterprise::class)->name('enterprise.get');
  Route::post('list', ListEnterprises::class)->name('enterprise.list');
  Route::put('/', UpdateEnterprise::class)->name('enterprise.update');
  Route::delete('/{id}', DeleteEnterprise::class)->name('enterprise.delete');
});
