<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correos extends Model
{
    protected $table = 'correos';

    protected $primaryKey = 'id_cor';

    protected $fillable = [
    	'correo',
    	'id_lis'
    ];

    public function listaCorreos()
    {
    	return $this->belongsTo('App\ListaCorreos');
    }
}
