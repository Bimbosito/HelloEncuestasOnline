<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaCorreos extends Model
{
    protected $table = 'lista_correos';

    protected $primaryKey = 'id_lis';

    protected $fillable = [
    	'nombre',
    	'id_usu'
    ];

    public function usuarios()
    {
    	return $this->belongsTo('App\Usuarios');// 1 a 1--- 
    }

    public function correos()
    {
    	return $this->hasMany('App\Correos');//1 a muchos
    }
}
