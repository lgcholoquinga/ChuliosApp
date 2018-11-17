<?php

namespace ChuliosApp;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'id_bus',
        'nombre_prop',
        'placa_bus',
        'numero_bus',
        'capacidad_bus',
        'foto_bus',
        'cedula_prop',
        'celular_prop',
        'saldo_bus'];
    protected $table="bus";
    protected $primaryKey='id_bus';
    public $timestamps = false;

    public function bus(){
        return $this->hasMany('ChuliosApp\Chulio', 'idchulio');
    }
}
