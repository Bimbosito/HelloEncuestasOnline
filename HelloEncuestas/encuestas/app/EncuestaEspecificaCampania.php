<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaEspecificaCampania extends Model
{
    protected $table = 'encuesta_especifica_campania';

    protected $primaryKey = 'id_esca';

    protected $fillable = [
    	'id_esp',
    	'id_cam'
    ];

    public function encuestaEspecifica()
    {
    	return $this->belongsTo('App\EncuestaEspecifica');
    }

    public function campania()
    {
    	return $this->belongsTo('App\Campania');
    }
}
