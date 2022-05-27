<?php

namespace Services\Enterprise\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class GetEnterprise extends FormRequest
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
          'id' => 'required|int|exists:enterprises,id',
          'relations' => 'present|array',
          'relations.*' => 'required|string|' . Rule::in(['Surveys', 'AppliedSurveys', 'AppliedSurveys.Survey']),
        ];
    }

    public function messages()
    {
        return [
          'id.*' => 'La empresa que intentas obtener no existe.',
          'relations.*' => 'Uno o más objetos de la empresa no existen.',
        ];
    }
}
