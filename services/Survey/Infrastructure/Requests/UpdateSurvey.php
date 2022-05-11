<?php

namespace Services\Survey\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateSurvey extends FormRequest
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
      'id' => 'required|int|exists:surveys,id',
      'name' => 'required|string|min:5|max:250|unique:surveys,name,' . $this -> id,
      'description' => 'required|string|min:5|max:250',
      'steps' => 'present|array',
    ];
  }

  public function messages()
  {
    return [
      'id.*' => 'La encuesta que intentas modificar no existe.',
      'name.*' => 'El nombre de la encuesta es un dato requerido y debe contener entre 5 y 250 caracteres y no debe de estar asignado.',
      'description.*' => 'La descripción es un dato requerido y debe contener entre 20 y 500 caracteres.',
      'steps.*' => 'Indica los pasos en que será aplicada la encuesta.'
    ];
  }
}
