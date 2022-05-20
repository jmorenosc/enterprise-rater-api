<?php

namespace Services\QuestionResponse\Domain\Contracts;

interface QuestionResponseContracts
{

  /**
   * @method createResponse
   * @param array $response
   * @param string $response['title']
   * @param ?string $response['value']
   * @param array $response['questions']
   * @param int $response['questions']['id']
   * @param int $response['questions']['position']
   */
  public function createResponse(array $response): object;

  /**
   * @method updateResponse
   * @param array $response
   * @param string $response['title']
   * @param ?string $response['value']
   * @param array $response['questions']
   * @param int $response['questions']['id']
   * @param int $response['questions']['position']
   */
  public function updateResponse(array $response): object;
  
}
