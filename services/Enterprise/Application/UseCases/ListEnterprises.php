<?php

namespace Services\Enterprise\Application\UseCases;

class ListEnterprises
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
  private $param, $order;
  /**
   * @var bool
   */
  private $trashed;

  public function __construct(object $model, ?int $per_page = 50, ?string $order = 'asc', ?string $param = null, ?bool $trashed = false) {
    $this -> model = $model;
    $this -> per_page = $per_page;
    $this -> order = $order;
    $this -> param = $param;
    $this -> trashed = $trashed;
  }

  public function __invoke(): object
  {
    return $this -> model
      -> when($this -> param, function($q){
        $q -> where('name', 'like', "%$this->param%")
        -> orwhere('rfc', 'like', "%$this->param%");
      })
      -> when($this -> trashed, function($q){
        return $q -> withTrashed();
      })
      -> orderBy('id', $this -> order)
      -> paginate($this -> per_page);
  }

}