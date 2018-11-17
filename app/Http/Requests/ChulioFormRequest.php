<?php

namespace ChuliosApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChulioFormRequest extends FormRequest
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
            'usuario' => 'required',
            'nombre' => 'required',
            'cedula' => 'required|unique:chulio,cedula|min:10|max:10',
            'celular' => 'required|min:10|max:10',
            'direccion' => 'required|max:100',
            'contrasenia' => 'required',
            'BUS_id_bus' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'usuario.required'=>'El campo es obligatorio',
            'nombre.required'=>'El campo Nombre Chulio es obligatorio',
            'cedula.min'=>'La Cédula contiene 10 dígitos.',
            'cedula.max'=>'La Cédula contiene 10 dígitos.',
            'cedula.required'=>'La Cédula debe ser obligatorio',
            'cedula.unique'=>'Cédula ya ha existe en nuestros registros',
            'celular.min'=>'El campo Celular contiene 10 dígitos',
            'celular.max'=>'El campo Celular contiene 10 dígitos',
            'celular.required'=>'El campo Celular es obligatorio',
            'direccion.required'=>'El campo Direccion es obligatorio',
            'contrasenia.required'=>'El campo es obligatorio',
            'BUS_id_bus.required'=>'El campo es obligatorio'
        ];
    }
}
