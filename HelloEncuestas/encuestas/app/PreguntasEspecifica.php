<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntasEspecifica extends Model
{
    protected $table = 'preguntas_especifica';

    protected $primaryKey = 'id_pesp';

    protected $fillable = [
    	'pregunta',
    	'tipo',
    	'id_esp',
    ];

    public function encuestaEspecifica(){
    	return $this->belongsTo('App\EncuestaEspecifica');
    }

    public function opcionMultipleEspecifica(){
    	return $this->hasMany('App\OpcionMultipleEspecifica');
    }

    public function respuestasEspecifica(){
    	return $this->hasMany('App\RespuestasEspecifica');
    }
}
