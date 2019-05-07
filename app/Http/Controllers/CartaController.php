<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function atualizar(Request $request){
        $id = $request->input('id-edita-carta');
        $carta = \App\Carta::find($id);
        if($request->imagemedita){
            $pathArquivoAntigo = '/public/imagens/'.$carta->imagem;
            Storage::delete($pathArquivoAntigo);
            $path = $request->imagemedita->store('/public/imagens');
            $path = str_replace('public/imagens/', '', $path);
            $carta->imagem = $path;


        }
        $carta->nome = $request->input('nome-edit-carta');
        $carta->cor = $request->input('cor-edit-carta');
        $carta->descricao = $request->input('descricao-edit-carta');
        $carta->save();
        return redirect('/pagina-inicial');

    }

    public function paineleditar($id){
        $carta = \App\Carta::find($id);
        $listaCategorias = "";
        foreach($carta->categorias as $cat){
            $listaCategorias .= "categoria-".$cat->id.",";
        }
        if($listaCategorias){
            $listaCategorias = substr_replace($listaCategorias, "", -1);
        }

        $carta->listacategorias = $listaCategorias;
        $dados = [
            'carta' => $carta,
            'categorias' => \App\Categoria::all()
        ];
        return view('cartas-crud.editar', $dados);
    }
  

    public function deletar(Request $request){
        $id = $request->input('id');
        \App\Carta::destroy($id);
        return redirect('/pagina-inicial');
    }


    public function criar(Request $request)
    {
        $idUsuario = \Auth::user()->id;
        $nomeCarta = $request->input('nome-carta');
        $corCarta = $request->input('cor-carta');
        $descricaoCarta = $request->input('descricao-carta');
        $path = $request->imagem->store('/public/imagens');
        $path = str_replace('public/imagens/', '', $path);
        $carta = new \App\Carta;
        $carta->usuario = $idUsuario;
        $carta->nome = $nomeCarta;
        $carta->cor = $corCarta;
        $carta->descricao = $descricaoCarta;
        $carta->imagem = $path;
        $carta->save();

        if($request->input('lista-categorias')){
            $categorias = $request->input('lista-categorias');
            $categorias = explode(',', $categorias);
            foreach($categorias as $categoria){
                $idCategoria = str_replace('categoria-', '', $categoria);
                $carta->categorias()->attach($idCategoria);
            }
        }


        return redirect('/pagina-inicial');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
