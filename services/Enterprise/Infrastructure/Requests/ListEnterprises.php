<?php

namespace Services\Enterprise\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ListEnterprises extends FormRequest
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
          'per_page' => 'present|nullable|numeric|' . Rule::in([10, 50, 100, 200, 500]),
          'order' => 'present|nullable|string|' . Rule::in(['asc', 'desc']),
          'param' => 'present|nullable|string|max:60',
          'trashed' => 'present|nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
          'per_page.*' => 'El paginado de las empresas no está en el rango permitido.',
          'order.*' => 'El órden de lista solo puede ser ascendente o descendente.',
          'order.*' => 'El parámatero de búsqueda solo puede contener entre 2 y 60 caracteres.',
          'trashed.*' => 'Si quieres elementos eliminados confirma con un dato tipo boolean.',
        ];
    }
}
