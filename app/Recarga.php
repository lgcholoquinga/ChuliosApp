<?php

namespace ChuliosApp;

use Illuminate\Database\Eloquent\Model;

class Recarga extends Model
{
    protected $fillable = [
        'id_recarga',
        'valor_recarga',
        'fecha_recarga',
        'USUARIO_id_usuario',
        'SEDE_id_sede'];
    protected $table="recarga";
    protected $primaryKey='id_recarga';
    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo('ChuliosApp\Usuario', 'id_usuario');
    }

    public function sede(){
        return $this->belongsTo('ChuliosApp\Sede', 'id_sede');
    }
}
