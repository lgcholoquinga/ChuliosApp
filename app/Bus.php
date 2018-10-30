<?php

namespace ChuliosApp;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
  protected $fillable = ['ID_BUS','NOMBRE_PROP','PLACA_BUS','NUMERO_BUS','CAPACIDAD_BUS','FOTO_BUS','CEDULA_PROP','CELULAR_PROP','CODIGO_QR_BUS'];
  protected $table="bus";
  protected $primaryKey='ID_BUS';
  public $timestamps = false;

}
