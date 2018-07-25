<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class ListaClientes extends Model
{
	protected $table = 'regcorreo';

	protected $primaryKey = 'id_rcor';

	protected $fillable = [

				'id_cor',
				'nombre',
				'correo',
				'telefono',
				'direccion',
				'empresa',
				'id_lis',
	]

	public function correos()
	{
		return $this->hasMany('App\Correos');
	}
	public function regcorreo()
	{
		return $this->hasMany('App\ListaCorreos');
	}

}
?>