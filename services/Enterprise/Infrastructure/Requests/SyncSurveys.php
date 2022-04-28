<?php

namespace Services\Enterprise\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SyncSurveys extends FormRequest
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
          'id' => 'required|exists:enterprises,id',
          'surveys' => 'required|array',
          'surveys.*' => 'required|integer|exists:surveys,id'
        ];
    }

    public function messages()
    {
        return [
          'id.*' => 'La empresa que intentas actualizar no existe.',
          'surveys.array' => 'Es necesario capturar las encuestas que quedarán asignadas a esta empresa.',
          'surveys.required' => 'Es necesario capturar las encuestas que quedarán asignadas a esta empresa.',
          'surveys.*.exists' => 'La encuesta que intentas agregar a esta empresa no existe.',
        ];
    }
}
