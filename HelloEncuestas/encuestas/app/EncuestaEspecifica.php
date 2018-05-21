<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaEspecifica extends Model
{
    protected $table = 'encuesta_especifica';

    protected $primaryKey = 'id_esp';

    protected $fillable = [
    	'nombre',
    	'fecha_inicio',
    	'fecha_fin',
    	'abierto',
        'borrado',
    	'sede',
    	'ciudad',
    	'evento',
    	'id_glo',
    	'id_usu'
    ];

    public function encuestaGlobal(){
    	return $this->belongsTo('App\EncuestaGlobal');
    }

    public function usuarios()
    {
    	return $this->belongsTo('App\Usuarios');
    }

    public function preguntasEspecifica(){
    	return $this->hasMany('App\PreguntasEspecifica');
    }

    public function encuestaEspecificaContestada(){
    	return $this->hasMany('App\EncuestaEspecificaContestada');
    }

    public function encuestaEspecificaCampania()
    {
    	return $this->hasMany('App\EncuestaEspecificaCampania');
    }
}
