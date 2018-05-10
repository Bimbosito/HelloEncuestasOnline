<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campania extends Model
{
    protected $table = 'campania';

    protected $primaryKey = 'id_cam';

    protected $fillable = [
    	'nombre',
    	'privacidad',
    	'sede',
    	'ciudad',
    	'evento',
    	'id_usu'
    ];

    public function usuarios()
    {
    	return $this->belongsTo('App\Usuarios');
    }

    public function fechasCampania()
    {
    	return $this->hasMany('App\FechasCampania');
    }

    public function detalleCampania()
    {
    	return $this->hasMany('App\DetalleCampania');
    }

    public function encuestaGlobalCampania()
    {
    	return $this->hasMany('App\EncuestaGlobalCampania');
    }

    public function encuestaEspecificaCampania()
    {
    	return $this->hasMany('App\EncuestaEspecificaCampania');
    }
}
