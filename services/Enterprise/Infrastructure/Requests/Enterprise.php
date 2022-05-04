<?php

namespace Services\Enterprise\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Enterprise extends FormRequest
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
            'id' => 'sometimes|int|exists:enterprises,id',
            'name' => 'required|string|min:5|max:250|unique:enterprises,name',
            'email' => 'required|string|email',
            'phone' => 'required|digits:10',
            'rfc' => 'string|nullable|alphanum|min:12|max:13',
        ];
    }

    public function messages()
    {
        return [
            'name.*' => 'El nombre de la empresa es un dato requerido y debe contener entre 5 y 250 caracteres.'
        ];
    }
}
