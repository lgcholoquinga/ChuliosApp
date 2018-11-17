<?php

namespace ChuliosApp;

use Illuminate\Database\Eloquent\Model;

class Chulio extends Model
{
    protected $table='chulio';

    protected $primaryKey='idchulio';

    public $timestamps=false;

    protected $fillable=[
        'idchulio',
        'usuario',
        'nombre',
        'cedula',
        'celular',
        'direccion',
        'contrasenia',
        'BUS_id_bus'
    ];

    public function bus(){
        return $this->belongsTo('ChuliosApp\Bus', 'id_bus');
    }
}
