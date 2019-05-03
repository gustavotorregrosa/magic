$("#btn-am-cria-carta").on("click", function(){
    $("#mdl-cria-carta").modal("show");
});

$("#mdl-cria-carta").on('hidden.bs.modal', function(){
    $("#frm-cria-carta")[0].reset();
});