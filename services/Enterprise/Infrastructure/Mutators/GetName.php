<?php

namespace Services\Enterprise\Infrastructure\Mutators;

trait GetName {

  public function getNameAttribute($val)
  {
    return strtoupper($val);
  }
  
}