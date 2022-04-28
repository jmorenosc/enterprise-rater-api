<?php

namespace Services\Enterprise\Domain\Contracts;

interface EnterpriseContracts
{

  /**
   * @method createEnterprise
   * @param string $name name of enterprise
   * @return object instance of enterprise
   */
  public function createEnterprise(String $name): Object;
  
  /**
   * @method getEnterprise
   * @param int $id id of enterprise to retriview
   * @return object instance of enterprise
   */
  public function getEnterprise(Int $id): ?Object;

  /**
   * Method to update name of enterprise
   * @method updateEnterprise
   * @param int $id id of enterprise to update
   * @param string $name name to enterprise to update
   * @return object instance of enterprise
   */
  public function updateEnterprise(int $id, string $name):void;

}