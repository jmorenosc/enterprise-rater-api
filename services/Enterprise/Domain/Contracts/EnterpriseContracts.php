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

  /**
   * Method to delete an enterprise
   * The enterprise will be deleted by soft delete
   * @method deleteEnterprise
   * @param int $id id of enterprise to delete
   * @return void
   */
  public function deleteEnterprise(int $id): void;

  /**
   * Method to list enterprises
   * if you want list with trashed
   * send trashed paran on true
   * @method listEnterprises
   * @param ?int $per_page limit of records to show default 50
   * @param ?string $order set order asc or desc default asc
   * @param ?string $param data to match in search default null
   * @param ?bool $trashed data to match in search default null
   * @return object
   */
  public function listEnterprises(?int $per_page = 50, ?string $order = 'asc', ?string $param = null, ?bool $trashed = false): object;

}