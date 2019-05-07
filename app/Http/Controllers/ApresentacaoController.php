<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApresentacaoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inicial(){

        $dados = [
            'cartas' => \App\Carta::with('usuarioCadastrante')->paginate(3),
            'categorias' => \App\Categoria::all()
        ];
        return view('cartas-crud.index', $dados);
    }


}
