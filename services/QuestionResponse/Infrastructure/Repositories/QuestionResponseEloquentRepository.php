<?php

namespace Services\QuestionResponse\Infrastructure\Repositories;

use App\Models\QuestionResponse;
use Services\QuestionResponse\Application\UseCases\AttachQuestions;
use Services\QuestionResponse\Application\UseCases\CreateResponse;
use Services\QuestionResponse\Application\UseCases\UpdateResponse;
use Services\QuestionResponse\Domain\Contracts\QuestionResponseContracts;

class QuestionResponseEloquentRepository implements QuestionResponseContracts
{
  use CreateResponse, AttachQuestions, UpdateResponse;

  /**
   * @var object
   */
  private $model;

  public function __construct() {
    $this->model = new QuestionResponse;
  }

  public function listResponses(array $data): Object
  {

    return $this -> model 
      -> orderBy('title', 'asc')
      -> when($data['param'], function($q)  use($data){
        $q -> where('title', 'like', '%' . $data['param'] . '%');
      })
      -> paginate($data['per_page']);

  }
  
}
