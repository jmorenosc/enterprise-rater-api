<?php

namespace Services\QuestionResponse\Application\UseCases;

trait CreateResponse
{

  /**
   * @method createResponse
   * @param array $response
   * @param string $response['title']
   * @param ?string $response['value']
   * @param array $response['questions']
   */
  public function createResponse(array $response): object{
    $r = $this -> model -> create([
      'title' => $response['title'],
      'value' => $response['value']
    ]);
    $this -> attachQuestions($r, $response['questions']);
    return $r;
  }
  
}
