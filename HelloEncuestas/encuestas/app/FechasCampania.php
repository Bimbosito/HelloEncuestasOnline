<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechasCampania extends Model
{
    protected $table = 'fechas_campania';

    protected $primaryKey = 'id_fcam';

    protected $fillable = [
    	'id_fech',
    	'id_cam'
    ];

    public function campania()
    {
    	return $this->belongsTo('App\Campania')
    }

    public function fechas()
    {
    	return $this->belongsTo('App\Fechas');
    }
}
