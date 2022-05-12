<?php

namespace Services\Survey\SurveyStep\Application\UseCases;

class ListSurveySteps
{
  /**
   * @var object
   */
  private $repository;

  public function __construct(object $repository) {
    $this->repository = $repository;
  }

  public function __invoke(array $data)
  {
    return $this -> repository
      -> when($data['param'], function($q) use($data){
        $q -> where('name', 'like', '%' . $data['param'] . '%');
      })
      -> with('Childrens')
      -> orderBy('name', 'asc') 
      -> paginate(isset($data['per_page']) ? $data['per_page'] : 10);
  }

}