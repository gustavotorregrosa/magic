$(init);

function init(){
    let cor = $("#cor-inicial").val();
    console.log(cor);
    $("#cor-edit-carta").val(cor).change();
    flegarCategorias();
}

function flegarCategorias(){
    arrayCat = $("#lista-categorias-edit").val().split(",");
    let listaPag = $("#grupo-caracteristicas-edit .item-categoria-edit");
    // console.log(listaPag);
    listaPag.each(function(index, item){
        // console.log(index);
        categoria = $(item).val();
        if(arrayCat.includes(categoria)){
            $(this).prop('checked', true);
        }

    });
}
