<?php

namespace Services\Survey\Application\UseCases;

class ListSurveys
{

  /**
   * @var object
   */
  private $model;
  /**
   * @var int
   */
  private $per_page;
  /**
   * @var string
   */
  private $order, $param;
  /**
   * @var bool
   */
  private $trashed;

  public function __construct(object $model, int $per_page, string $order = 'asc', ?string $param, ?bool $trashed) {
    $this->model = $model;
    $this->per_page = $per_page;
    $this->order = $order;
    $this->param = $param;
    $this->trashed = $trashed;
  }

  public function __invoke(): object
  {
    return $this -> model
      -> when($this -> trashed, function($q){
        return $q -> withTrashed();
      })
      -> when($this -> param, function($q){
        return $q -> where('name', 'like', "%$this->param%");
      })
      ->orderBy('id', $this -> order)
      -> paginate($this -> per_page);
  }

}