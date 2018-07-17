<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroGlobal extends Model
{
    protected $table = 'registro_global';

    protected $primaryKey = 'id_regglo';

    protected $fillable = [
    	'campo',
    	'id_glo'
    ];

    public function encuestaEspecifica()
    {
    	return $this->belongsTo('App\EncuestaGlobal');
    }
}
