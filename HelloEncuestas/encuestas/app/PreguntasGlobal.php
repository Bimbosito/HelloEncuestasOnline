<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntasGlobal extends Model
{
    protected $table = 'preguntas_global';

    protected $primaryKey = 'id_pglo';

    protected $fillable = [
    	'pregunta',
    	'tipo',
    	'id_glo',
    ];

    public function encuestaGlobal(){
    	return $this->belongsTo('App\EncuestaGlobal')
    }

    public function opcionMultipleGlobal(){
    	return $this->hasMany('App\OpcionMultipleGlobal');
    }

    public function respuestasGlobal(){
    	return $this->hasMany('App\RespuestasGlobal');
    }
}
