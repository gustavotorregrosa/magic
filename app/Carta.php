<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Carta extends Model
{
    use SoftDeletes;
    protected $table = "carta";
    protected $guarded = [];


    public function usuarioCadastrante()
    {
        return $this->belongsTo('App\User', 'usuario');
    }


    public function categorias(){
		return $this->belongsToMany('App\Categoria', 'App\Associacao', 'carta_id', 'tipo_id');
	}


}
