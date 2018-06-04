<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaGlobal extends Model
{
    protected $table = 'encuesta_global';

    protected $primaryKey = 'id_glo';

    protected $fillable = [
    	'nombre',
    	'fecha_inicio',
    	'fecha_fin',
    	'abierto',
        'borrado',
    	'sede',
    	'ciudad',
    	'evento',
    	'id_usu'
    ];

    public function usuarios()
    {
    	return $this->belongsTo('App\Usuarios');
    }

    public function encuestaEspecifica(){
    	return $this->hasMany('App\EncuestaEspecifica');
    }

    public function preguntasGlobal()
    {
    	return $this->hasMany('App\PreguntasGlobal');
    }

    public function encuestaGlobalContestada(){
    	return $this->hasMany('App\EncuestaGlobalContestada');
    }

    public function encuestaGlobalCampania()
    {
    	return $this->hasMany('App\EncuestaGlobalCampania');
    }
}
