<?php
namespace ChuliosApp\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class BusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'nombre'=>'required|string|max:60|min:3',
            'cedula'=>'required|unique:bus,CEDULA_PROP|min:10|max:10',
            'celular'=>'required|min:10|max:10',
            'placa'=>'required|min:7|max:7|unique:bus,PLACA_BUS',
            'capacidad'=>'required',
            'numero'=>'required',
            'foto'=>'required|image',

        ]; 
    }
    public function messages()
    {
     return[
        'cedula.min'=>'La Cédula contiene 10 dígitos.',
        'cedula.max'=>'La Cédula contiene 10 dígitos.',
        'cedula.required'=>'La Cédula debe ser obligatorio',
        'cedula.unique'=>'Cédula ya ha existe en nuestros registros',


        'nombre.required'=>'El campo Nombre Propietario es obligatorio',

        'numero.required'=>'El campo Numero del Bus es Obligatorio',

        'celular.min'=>'El campo Celular contiene 10 dígitos',
        'celular.max'=>'El campo Celular contiene 10 dígitos',
        'celular.required'=>'El campo Celular es obligatorio',

        'placa.required'=>'El campo placa Bus es Obligatorio',
        'placa.min'=>'El campo placa Bus contiene 7 caracteres',
        'placa.max'=>'El campo placa Bus contiene 7 caracteres',
        'placa.unique'=>'Placa Bus ya existe en nuestros registros',


        'capacidad.required'=>'El campo capacidad bus es Obligatorio',

        'foto.required'=>'Necesitas subir un archivo',
        'foto.image'=>'Necesitas subir un archivo tipo imagen'

     ];
   }
}
