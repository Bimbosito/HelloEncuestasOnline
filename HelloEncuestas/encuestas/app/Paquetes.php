<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquetes extends Model
{
    protected $table = 'paquetes';

    protected $primaryKey = 'id_paq';

    protected $fillable = [
    	'nombre',
    	'descripcion',
    	'precio'
    ];

    public function usuarios()
    {
    	return $this->hasMany('App\Usuarios');
    }
}
