<?php

use Illuminate\Support\Facades\Route;
use Services\Enterprise\Infrastructure\Controllers\{
  CreateEnterprise,
  GetEnterprise
};

Route::prefix('api/v1')->group(function(){
  Route::post('/', CreateEnterprise::class)->name('enterprise.create');
  Route::get('/{id}', GetEnterprise::class)->name('enterprise.create');
});
