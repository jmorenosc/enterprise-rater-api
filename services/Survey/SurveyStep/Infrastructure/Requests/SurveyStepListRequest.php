<?php

namespace Services\Survey\SurveyStep\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class SurveyStepListRequest extends FormRequest
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
      'param' => 'present|nullable|string|min:1|max:250',
      'per_page' => 'required|integer|' . Rule::in([10, 50, 100, 200, 500]),
    ];
  }

  public function messages()
  {
    return [
      'param.*' => 'El parámetro de úsqueda debe contener entre 1 y 250 caracteres.',
      'per_page.*' => 'El paginado que intentas aplicar no está permitido.'
    ];
  }

}