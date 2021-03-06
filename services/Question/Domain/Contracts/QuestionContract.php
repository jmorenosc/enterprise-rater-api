<?php

namespace Services\Question\Domain\Contracts;

interface QuestionContract
{

  /**
   * Create question
   * and attach step
   * @method createQuestion
   * @param Array $question {
   * @type string title
   * @type string impact
   * @type string type
   * @type boolean multiple
   * @type boolean required
   * }
   * @param array $survey_step{
   *  @type int $id
   *  @type ?int $position
   * }
   * @return Object
   */
  public function createQuestion(array $question, array $survey_steps): Object;

  /**
   * Update question
   * and attach steps
   * @method updateQuestion
   * @param Array $question {
   * @type string title
   * @type string impact
   * @type string type
   * @type boolean multiple
   * @type boolean required
   * }
   * @param array $survey_step{
   *  @type int $id
   *  @type ?int $position
   * }
   * @return Object
   */
  public function updateQuestion(array $question, array $survey_steps, array $responses): Object;

  /**
   * Get question by id
   * @method getQuestion
   * @param int $id
   */
  public function getQuestion(int $id, array $relations = []): ?Object;

  /**
   * List all questions
   * @method listQuestions
   * @param int $per_page
   * @param null|string $param
   * @return object
   */
  public function listQuestions(int $per_page = 10, ?string $param = null): object;

}