<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionMultipleEspecifica extends Model
{
    protected $table = 'opcion_multiple_especifica';

    protected $primaryKey = 'id_resp';

    protected $fillable = [
    	'respuestas',
    	'id_pesp'
    ];

    public function preguntasEspecifica()
    {
    	return $this->belongsTo('App\PreguntasEspecifica');
    }
}
