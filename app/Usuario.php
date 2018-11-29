<?php

namespace ChuliosApp;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'id_usuario',
        'nombre_usuario',
        'cedula_usuario',
        'celular_usuario',
        'email_usuario',
        'tipo_usuario',
        'contrasenia_usuario',
        'saldo_usuario'];
    protected $table="usuario";
    protected $primaryKey='id_usuario';
    public $timestamps = false;

    public function recargas(){
        return $this->hasMany('ChuliosApp\Recarga', 'id_recarga');
    }
}
