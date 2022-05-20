<?php

namespace Services\QuestionResponse\Application\UseCases;

trait AttachQuestions
{

  private function attachQuestions(object $response, array $questions)
  {
    $r = [];
    foreach ($questions as $question) {
      $r[$question['id']] = [ 'position' => $question['position'] ];
    }
    $response -> Questions() -> attach($r);
  }
  
}
