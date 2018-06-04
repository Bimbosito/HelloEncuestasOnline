<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';

    protected $primaryKey = 'id_usu';

    protected $fillable = [
    	'nombre',
    	'email',
    	'contrasena',
    	'empresa',
    	'logo',
    	'id_paq'
    ];

    public function paquetes()
    {
		return $this->belongsTo('App\Paquetes');    	
    }

    public function encuestaEspecifica()
    {
    	return $this->hasMany('App\EncuestaEspecifica');
    }
    public function encuestaGlobal()
    {
    	return $this->hasMany('App\EncuestaGlobal');
    }
    public function campania()
    {
    	return $this->hasMany('App\Campania');
    }
    public function marca()
    {
    	return $this->hasMany('App\Marca');
    }
    public function listaCorreos()
    {
    	return $this->hasMany('App\ListaCorreos');
    }
}
