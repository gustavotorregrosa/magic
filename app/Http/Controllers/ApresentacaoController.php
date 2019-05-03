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
        return view('cartas-crud.index');
    }


}
