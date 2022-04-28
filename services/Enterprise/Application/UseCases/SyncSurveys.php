<?php

namespace Services\Enterprise\Application\UseCases;

class SyncSurveys
{

  /**
   * @var object
   */
  private $enterprise;
  /**
   * @var array
   */
  private $surveys;

  public function __construct(object $enterprise, array $surveys) {
    $this->enterprise = $enterprise;
    $this->surveys = $surveys;
  }
  
  public function __invoke():void
  {
    $this -> enterprise
      -> Surveys()
      -> syncWithoutDetaching($this -> surveys);
  }

}