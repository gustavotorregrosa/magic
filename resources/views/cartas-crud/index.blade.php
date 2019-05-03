@extends('cartas-crud.layout')
@section('titulo', 'Magic - Visie')


@section('content')

<div class="row">
    <button id="btn-am-cria-carta" class="btn btn-success btn-sm">Adicionar</button>
</div>

<br><br>

<div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cor</th>
                <th scope="col">Usuário</th>
                <th scope="col">Imagem</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Gigante de Bronze</td>
                <td>Terra</td>
                <td>gustavo.torregrosa@gmail.com</td>
                <td>
                    <img style="max-height: 4em;" src="{{asset('/storage/imagens/magic.jpg')}}" alt="">
                </td>
                <td>
                    <button class="btn btn-primary btn-sm">
                        Editar
                    </button>
                    <button class="btn btn-danger btn-sm">
                        Deletar
                    </button>
                </td>
            </tr>

            <tr>
                <td>Gigante de Bronze</td>
                <td>Terra</td>
                <td>gustavo.torregrosa@gmail.com</td>
                <td>
                    <img style="max-height: 4em;" src="{{asset('/storage/imagens/magic.jpg')}}" alt="">
                </td>
                <td>
                    <button class="btn btn-primary btn-sm">
                        Editar
                    </button>
                    <button class="btn btn-danger btn-sm">
                        Deletar
                    </button>
                </td>
            </tr>

        </tbody>
    </table>




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
            <form id="frm-cria-carta" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome-carta">Nome</label>
                        <input type="text" class="form-control" id="nome-carta">
                    </div>
                    <div class="form-group">
                        <label for="cor-carta">Cor</label>
                        <select class="form-control" id="cor-carta" required>
                            <option disabled selected>Escolha uma cor</option>
                            <option value="vermelho">Vermelho</option>
                            <option value="verde">Verde</option>
                            <option value="branco">Branco</option>
                            <option value="azul">Azul</option>
                            <option value="preto">Preto</option>
                            <option value="incolor">Incolor</option>
                            

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
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