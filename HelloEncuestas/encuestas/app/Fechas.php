<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fechas extends Model
{
    protected $table = 'fechas';

    protected $primaryKey = 'id_fech';

    protected $fillable = [
    	'fecha_inicio',
    	'fecha_fin'
    ];

    public function fechasCampania()
    {
    	return $this->hasMany('App\FechasCampania');
    }
}
