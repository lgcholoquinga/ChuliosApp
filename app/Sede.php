<?php

namespace ChuliosApp;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = [
        'id_sede',
        'nombre_sede',
        'contrasenia_sede'];
    protected $table="sede";
    protected $primaryKey='id_sede';
    public $timestamps = false;

    public function recargas(){
        return $this->hasMany('ChuliosApp\Recarga', 'id_recarga');
    }
}
