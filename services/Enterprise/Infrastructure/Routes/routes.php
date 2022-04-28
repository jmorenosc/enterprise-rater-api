<?php

use Illuminate\Support\Facades\Route;
use Services\Enterprise\Infrastructure\Controllers\{
  CreateEnterprise,
  GetEnterprise,
  UpdateEnterprise
};

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateEnterprise::class)->name('enterprise.create');
  Route::get('/{id}', GetEnterprise::class)->name('enterprise.get');
  Route::put('/', UpdateEnterprise::class)->name('enterprise.update');
});
