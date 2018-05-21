<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroEspecificaContestado extends Model
{
    protected $table = 'registro_especifica_contestado';

    protected $primaryKey = 'id_regespcon';

    protected $fillable = [
    	'texto',
    	'id_regesp',
        'id_econ'
    ];

    public function encuestaEspecifica()
    {
    	return $this->belongsTo('App\EncuestaEspecificaContestada');
    }
}
