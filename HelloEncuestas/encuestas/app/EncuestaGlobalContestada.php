<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaGlobalContestada extends Model
{
    protected $table = 'encuesta_global_contestada';

    protected $primaryKey = 'id_gcon';

    protected $fillable = [
    	'nombre',
    	'apellidos',
    	'id_glo'
    ];

    public function encuestaGlobal(){
    	return $this->belongsTo('App\EncuestaGlobal');
    }

    public function respuestasGlobal(){
    	return $this->hasMany('App\RespuestasGlobal');
    }
}
