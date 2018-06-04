<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestasEspecifica extends Model
{
    protected $table = 'respuestas_especifica';

    protected $primaryKey = 'id_resp';

    protected $fillable = [
    	'respuesta',
    	'id_pesp',
    	'id_econ'
    ];

    public function preguntasEspecifica()
    {
    	return $this->belongsTo('App\PreguntasEspecifica');
    }

    public function encuestaEspecificaContestada()
    {
    	return $this->belongsTo('App\EncuestaEspecificaContestada');
    }
}
