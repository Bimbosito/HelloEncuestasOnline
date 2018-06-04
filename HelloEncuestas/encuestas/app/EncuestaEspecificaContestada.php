<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaEspecificaContestada extends Model
{
    protected $table = 'encuesta_especifica_contestada';

    protected $primaryKey = 'id_econ';

    protected $fillable = [
    	'nombre',
    	'apellidos',
    	'id_esp'
    ];

    public function encuestaEspecifica(){
    	return $this->belongsTo('App\EncuestaEspecifica');
    }

    public function respuestasEspecifica(){
    	return $this->hasMany('App\RespuestasEspecifica');
    }
}
