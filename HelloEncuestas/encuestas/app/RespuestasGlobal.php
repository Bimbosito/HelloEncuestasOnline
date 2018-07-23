<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestasGlobal extends Model
{
    protected $table = 'respuestas_global';

    protected $primaryKey = 'id_rglo';

    protected $fillable = [
    	'respuesta',
    	'id_pglo',
    	'id_gcon'
    ];

    public function preguntasGlobal()
    {
    	return $this->belongsTo('App\PreguntasGlobal');
    }

    public function encuestaGlobalContestada()
    {
    	return $this->belongsTo('App\EncuestaGlobalContestada');
    }
}
