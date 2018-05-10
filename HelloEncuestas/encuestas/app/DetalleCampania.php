<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCampania extends Model
{
    protected $table = 'detalle_campania';

    protected $primaryKey = 'id_dcam';

    protected $fillable = [
    	'id_cam',
    	'id_mar'
    ];

    public function campania()
    {
    	return $this->belongsTo('App\Campania');
    }

    public function marca()
    {
    	return $this->belongsTo('App\Marca');
    }

}
