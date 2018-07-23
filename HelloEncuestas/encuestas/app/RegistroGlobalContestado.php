<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroEspecificaContestado extends Model
{
    protected $table = 'registro_global_contestado';

    protected $primaryKey = 'id_regglocon';

    protected $fillable = [
    	'texto',
    	'id_regglo',
        'id_gcon'
    ];

    public function encuestaEspecifica()
    {
    	return $this->belongsTo('App\EncuestaGlobalContestada');
    }
}
