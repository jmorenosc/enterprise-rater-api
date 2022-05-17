<?php

namespace Services\Question\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
{

  protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
  {
    throw new HttpResponseException(response()->json([
      'success'   => false,
      'message'   => 'Validation errors',
      'data'      => $validator->errors()
    ], 422));
  }

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'id' => 'sometimes|integer|exists:questions,id',
      'title' => 'required|string|min:5|max:250',
      'impact' => 'required|string|' . Rule::in(['none', 'low', 'moderate', 'high']),
      'type' => 'required|string|' . Rule::in(['text', 'checkbox', 'select']),
      'multiple' => 'required|boolean',
      'required' => 'required|boolean',
      'survey_steps' => 'required|array',
      'survey_steps.*.id' => 'integer|exists:survey_steps,id',
      'survey_steps.*.position' => 'nullable|present|integer'
    ];
  }

  public function messages()
  {
    return [ ];
  }

}