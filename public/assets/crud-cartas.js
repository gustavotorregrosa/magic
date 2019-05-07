$("#btn-am-cria-carta").on("click", function(){
    $("#mdl-cria-carta").modal("show");
});

$("#mdl-cria-carta").on('hidden.bs.modal', function(){
    $("#frm-cria-carta")[0].reset();
});


$(".btn-deleta-carta").on("click", function(){
    let id = $(this).data("id");
    $("#inpt-id-carta-deletada").val(id);
    $("#mdl-deleta-carta").modal("show");
});

$(".editar-carta").on("click", function(){
    let id = $(this).data("id");
    let dominio = $("#dominio").val();
    let url = dominio + "/edita-carta/" + id;
    window.location.href = url;

});

$("#grupo-caracteristicas .item-categoria").on("click", function(){
    listaChecked = [];
    listaItems = $("#grupo-caracteristicas .item-categoria");

    $(listaItems).each(function(index, item){
        categoria = $(item).val();
        isChecado = $(item).prop('checked');
        if(isChecado){
            listaChecked.push(categoria);
        }

    });

    $("#lista-categorias").val(listaChecked);

    
});