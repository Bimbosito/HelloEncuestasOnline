<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionMultipleGlobal extends Model
{
    protected $table = 'opcion_multiple_global';

    protected $primaryKey = 'id_rgl';

    protected $fillable = [
    	'respuestas',
    	'id_pglo'
    ];

    public function preguntasGlobal()
    {
    	return $this->belongsTo('App\PreguntasGlobal');
    }
}
