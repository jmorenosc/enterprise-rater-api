<?php

namespace Services\Enterprise\Domain\Contracts;

interface EnterpriseContracts
{

  /**
   * @param string $name name of enterprise
   * @return object instance of enterprise
   */
  public function createEnterprise(String $name): Object;
  
  /**
   * @param int $id id of enterprise to retriview
   * @return object instance of enterprise
   */
  public function getEnterprise(Int $id): ?Object;

}