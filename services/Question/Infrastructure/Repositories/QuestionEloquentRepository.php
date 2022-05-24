<?php

namespace Services\Question\Infrastructure\Repositories;

use App\Models\Question;
use Services\Question\Domain\Contracts\QuestionContract;

class QuestionEloquentRepository implements QuestionContract
{

  /**
   * @var App\Models\Question
   */
  private $repository;

  public function __construct() {
    $this->repository = new Question;
  }

  public function createQuestion(array $question, array $survey_steps): Question
  {
    $resource = $this -> repository
      -> create($question);
    $resource -> SurveySteps() -> sync($this -> steps($survey_steps));
    return $resource;
  }

  public function updateQuestion(array $question, array $survey_steps, array $responses): Question
  {
    $resource = $this -> repository -> find($question['id']) ;
    $resource -> update([
      "title" => $question['title'],
      "impact" => $question['impact'],
      "type" => $question['type'],
      "multiple" => $question['multiple'],
      "required" => $question['required']
    ]);
    $resource -> SurveySteps() -> sync($this -> steps($survey_steps));
    $this -> syncResponses($resource, $responses);
    return $resource;
  }

  private function syncResponses(object $resource, array $responses): void
  {
    $r = [];
    foreach ($responses as $response) {
      $r[$response['id']] = ['position' => $response['position']];
    }
    $resource -> QuestionResponses() -> sync($r);
  }

  private function steps($survey_steps): array
  {
    $steps = [];
    foreach ($survey_steps as $step) {
      $steps[$step['id']] = ['position' => $step['position']];
    }
    return $steps;
  }

  public function getQuestion(int $id, $relations = []): ?Question
  {
    return $this -> repository
      -> when(count($relations) > 0, function($q) use($relations){
        $q -> with($relations);
      })
      -> findOrFail($id);
  }

  public function listQuestions(int $per_page = 10, ?string $param = null): object
  {
    return $this -> repository
      ->when($param, function($q) use($param){
        $q -> where('title', 'like', '%' . $param . '%');
      })
      ->paginate($per_page);
  }

}