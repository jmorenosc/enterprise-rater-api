<?php

namespace Services\Survey\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ListSurveys extends FormRequest
{

  protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
  {
    throw new HttpResponseException(response()->json([
      'success'   => false,
      'message'   => 'Validation errors',
      'data'      => $validator->errors()
    ]));
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
      'per_page' => 'present|int|' . Rule::in([50, 100, 200, 500]),
      'order' => 'present|string|' . Rule::in(['asc', 'desc']),
      'param' => 'present|nullable|string|min:2|max:60',
      'trashed' => 'present|nullable|boolean'
    ];
  }

  public function messages()
  {
    return [
      'per_page.*' => 'El paginado de las encuestas no está dentro de los parámetros permitidos.',
      'order.*' => 'El órden en el listado no está dentro de los parámetros permitidos.',
      'param.*' => 'El parámetro de búsqueda deberá contener entre 2 y 60 caracteres.',
      'trashed.*' => 'Si requieres mostrar los elementos eliminados por favor cambia el parámetro trashed a verdadero.',
    ];
  }
}
