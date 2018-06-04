<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';

    protected $primaryKey = 'id_mar';

    protected $fillable = [
    	'nombre',
    	'id_usu'
    ];

    public function usuarios()
    {
    	return $this->belongsTo('App\Usuarios');
    }

    public function detalleCampania($value='')
    {
    	return $this->hasMany('App\DetalleCampania');
    }
}
