<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "tipo";
    protected $guarded = [];


    public function cartas()
    {

        return $this->belongsToMany('App\Carta', 'App\Associacao', 'tipo_id', 'carta_id');

    }
}


