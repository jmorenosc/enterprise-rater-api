<?php

namespace Services\QuestionResponse\Application\UseCases;

trait UpdateResponse
{

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
