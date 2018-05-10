<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaGlobalCampania extends Model
{
    protected $table = 'encuesta_global_campania';

    protected $primaryKey = 'id_glca';

    protected $fillable = [
    	'id_esp',
    	'id_cam'
    ];

    public function encuestaGlobal()
    {
    	return $this->belongsTo('App\EncuestaGlobal');
    }

    public function campania()
    {
    	return $this->belongsTo('App\Campania');
    }
}
