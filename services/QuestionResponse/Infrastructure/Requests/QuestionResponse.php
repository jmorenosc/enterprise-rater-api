<?php

namespace Services\QuestionResponse\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuestionResponse extends FormRequest
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
      'id' => 'sometimes|integer|exists:question_responses,id' ,
      'title' => 'required|string|min:2|max:250',
      'value' => 'present|nullable|max:150',
      'questions' => 'present|array',
      'questions.*.id' => 'required|integer|exists:questions,id',
      'questions.*.position' => 'present|integer|nullable',
    ];
  }

  public function messages()
  {
    return [ ];
  }

}