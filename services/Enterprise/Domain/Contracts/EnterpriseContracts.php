<?php

namespace Services\Enterprise\Domain\Contracts;

interface EnterpriseContracts
{

  /**
   * @method createEnterprise
   * @param array $enterprise array of enterprise data {
   * @type string name
   * @type string email
   * @type string phone
   * @type ?string rfc
   * }
   * @return object instance of enterprise
   */
  public function createEnterprise(Array $enterprise): Object;
  
  /**
   * @method getEnterprise
   * @param int $id id of enterprise to retriview
   * @return object instance of enterprise
   */
  public function getEnterprise(Int $id, Array $relations = []): ?Object;

  /**
   * Method to update name of enterprise
   * @method updateEnterprise
   * @param array $enterprise {
   * @param int $id id of enterprise to update
   * @param string $name name to enterprise to update
   * @param string $email email to enterprise to update
   * @param string $phone phone to enterprise to update
   * @param ?string $rfc rfc to enterprise to update
   * }
   * @return object instance of enterprise
   */
  public function updateEnterprise(Array $enterprise):void;

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

  /**
   * Method to sync surveys related
   * To sync Surveys with enterprise send in array al the surveys id
   * The surveys does not appear in list not wil be dettached 
   * @method syncSurveys
   * @param object $enterprise
   * @param array $surveys
   * @return void
   */
  public function syncSurveys(Object $enterprise, Array $surveys): void;

}