<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Criatipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $tipos = [
            'Land',
            'Enchantment',
            'Sorcery',
            'Instant',
            'Artifact',
            'Creature'
        ];

        foreach($tipos as $tipo){
            \App\Categoria::create([
                'nome' => $tipo
            ]);
        }

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
