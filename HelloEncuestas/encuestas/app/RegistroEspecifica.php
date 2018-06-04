<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroEspecifica extends Model
{
    protected $table = 'registro_especifica';

    protected $primaryKey = 'id_regesp';

    protected $fillable = [
    	'campo',
    	'id_esp'
    ];

    public function encuestaEspecifica()
    {
    	return $this->belongsTo('App\EncuestaEspecifica');
    }
}
