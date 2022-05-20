<?php

namespace Services\QuestionResponse\Infrastructure\Repositories;

use App\Models\QuestionResponse;
use Services\QuestionResponse\Application\UseCases\AttachQuestions;
use Services\QuestionResponse\Application\UseCases\CreateResponse;
use Services\QuestionResponse\Domain\Contracts\QuestionResponseContracts;

class QuestionResponseEloquentRepository implements QuestionResponseContracts
{
  use CreateResponse, AttachQuestions;

  /**
   * @var object
   */
  private $model;

  public function __construct() {
    $this->model = new QuestionResponse;
  }

  public function updateResponse(array $question_response): Object
  {
    $r = $this -> model -> find($question_response['id']);
    $r -> update([
      'title' => $question_response['title'],
      'value' => $question_response['value'],
    ]);
    $this -> attachQuestions($r, $question_response['questions']);
    return $r;
  }
  
}
