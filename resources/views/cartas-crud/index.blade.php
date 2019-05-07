@extends('cartas-crud.layout')
@section('titulo', 'Magic - Visie')


@section('content')

<div class="row">
    <button id="btn-am-cria-carta" class="btn btn-success btn-sm">Adicionar</button>
</div>

<br><br>

<div>
    <input type="hidden" id="dominio" value="{{ url('/') }}">

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Categorias</th>
                <th scope="col">Cor</th>
                <th scope="col">Usuário</th>
                <th scope="col">Imagem</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartas as $carta)
            <tr>
                <td>
                    {{$carta->nome}}
                </td>
                <td>
                    @foreach($carta->categorias as $categoria)
                        {{$categoria->nome}}
                        <br>
                    @endforeach
                </td>
                <td>{{$carta->cor}}</td>
                <td>{{$carta->usuarioCadastrante->name}}</td>
                <td>
                    <img style="max-height: 4em;" src="{{asset('/storage/imagens/'.$carta->imagem)}}" alt="">
                </td>
                <td>
                    <button data-id="{{ $carta->id }}" class="btn btn-primary btn-sm editar-carta">
                        Editar
                    </button>
                    <button data-id="{{ $carta->id }}" class="btn btn-danger btn-sm btn-deleta-carta">
                        Deletar
                    </button>
                </td>
            </tr>

            @endforeach





        </tbody>


    </table>




</div>

{{$cartas->links()}}

<div id="mdl-deleta-carta" class="fade modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar carta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('/deleta-carta') }}">
                @csrf
                <input name="id" type="hidden" id="inpt-id-carta-deletada">
                <div class="modal-body">
                    <p>Deseja realmente deletar a carta?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="mdl-cria-carta" class="fade modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Criar carta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="frm-cria-carta" action="{{ url('/cria-carta') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome-carta">Nome</label>
                        <input type="text" class="form-control" name="nome-carta" id="nome-carta">
                    </div>
                    <div class="form-group" id="grupo-caracteristicas">
                        <input type="hidden" id="lista-categorias" name="lista-categorias">
                        @foreach($categorias as $categoria)
                        <div class="form-check">
                            <input class="form-check-input item-categoria" type="checkbox" id="categoria-{{$categoria->id}}" value="categoria-{{$categoria->id}}">
                            <label class="form-check-label" for="categoria-{{$categoria->id}}">{{$categoria->nome}}</label>
                        </div>
                        @endforeach             
                    </div>
                    <div class="form-group">
                        <label for="cor-carta">Cor</label>
                        <select class="form-control" name="cor-carta" id="cor-carta" required>
                            <option disabled selected>Escolha uma cor</option>
                            <option value="vermelho">Vermelho</option>
                            <option value="verde">Verde</option>
                            <option value="branco">Branco</option>
                            <option value="azul">Azul</option>
                            <option value="preto">Preto</option>
                            <option value="incolor">Incolor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descricao-carta">Descrição</label>
                        <textarea class="form-control" name="descricao-carta" id="descricao-carta"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagem-carta">Upload de imagem</label>
                        <input type="file" class="form-control-file" name="imagem" id="imagem-carta">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


@section('script-adicional')
<script src="{{asset('assets/crud-cartas.js')}}"></script>
@endsection