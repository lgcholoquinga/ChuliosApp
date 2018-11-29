<?php

namespace ChuliosApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecargaFormRequest extends FormRequest
{
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
            'valor_recarga' => 'required',
            'fecha_recarga' => 'required',
            'USUARIO_id_usuario' => 'required',
            'SEDE_id_sede' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'valor_recarga.required'=>'El campo es obligatorio',
            'fecha_recarga.required'=>'El campo es obligatorio',
            'USUARIO_id_usuario.required'=>'Debe ser obligatorio',
            'SEDE_id_sede.required'=>'El campo es obligatorio'
        ];
    }
}
