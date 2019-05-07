@extends('cartas-crud.layout')
@section('titulo', 'Magic - Visie')


@section('content')
<form method="post" id="frm-edita-carta" action="{{ url('/atualizar-carta') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="id-edita-carta" name="id-edita-carta" value="{{$carta->id}}">
    <div class="modal-body">
        <div class="form-group">
            <label for="nome-carta">Nome</label>
            <input type="text" class="form-control" name="nome-edit-carta" id="nome-edit-carta" value="{{$carta->nome}}">
        </div>
        <div class="form-group" id="grupo-caracteristicas-edit">
            <input type="hidden" id="lista-categorias-edit" name="lista-categorias-edit" value="{{$carta->listacategorias}}">
            @foreach($categorias as $categoria)
            <div class="form-check">
                <input class="form-check-input item-categoria-edit" type="checkbox" id="edit-categoria-{{$categoria->id}}" value="categoria-{{$categoria->id}}">
                <label class="form-check-label" for="edit-categoria-{{$categoria->id}}">{{$categoria->nome}}</label>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="cor-edit-carta">Cor</label>
            <input type="hidden" id="cor-inicial" value="{{$carta->cor}}">
            <select class="form-control" name="cor-edit-carta" id="cor-edit-carta" required>
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
            <textarea class="form-control" name="descricao-edit-carta" id="descricao-edit-carta">{{$carta->descricao}}</textarea>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="imagem-edita-carta">Upload de imagem</label>
                    <input type="file" class="form-control-file" name="imagemedita" id="imagem-edita-carta">
                </div>
            </div>
            <div class="col-6">
                <img style="max-height: 10em;" src="{{asset('/storage/imagens/'.$carta->imagem)}}" alt="">
            </div>
        </div>
        <p>Usuario que cadastrou: {{$carta->usuarioCadastrante->name}}</p>


    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>

@endsection


@section('script-adicional')
<script src="{{asset('assets/edita-cartas.js')}}"></script>
@endsection