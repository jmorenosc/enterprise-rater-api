<?php

namespace Services\Enterprise\Infrastructure\Mutators;

trait GetRFC {

  public function getRfcAttribute($val)
  {
    return strtoupper($val);
  }
  
}