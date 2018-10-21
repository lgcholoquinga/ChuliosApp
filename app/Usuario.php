<?php

namespace ChuliosApp;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  protected $fillable = ['NOMBRE_USU','CEDULA_USU','CELULAR_USU','EMAIL_USU','FOTO_USU','CONTRASENIA_USU','SALDO_USU'];
  protected $table="usuario";
  protected $primaryKey='ID_USUARIO';
}
