function selecionarCategoria(id){
    zerarNotas();
    limparCategorias();

    $("#categoria_" + id).addClass("selecao-click");

    // Pegar o ID da categoria que irá ser carregada
    var categoria_id = parseInt($("#categoria_" + id).data("cat-id"));

    // Requisição para o servidor
    if (categoria_id > 0){
        var token = $("#_token").val();
        $.get("index.php?control=texto&action=notas&categoria_id=" + categoria_id + '&_token=' + token, function(data, status){
            if (status === "success"){
                if (data === ''){
                    alert("Categoria sem notas.");
                } else {
                    montarNotas(data);
                }
            } else {
                alert("Não foi possível obter a lista das notas.");
            }
        });
    }
}

function montarNotas(notas)
{
    zerarNotas();
    limparTexto();
    $("#div_notas").html(notas);

    contarNotas();
}

function contarNotas()
{
    var qtd = parseInt($("#div_notas > p").length);
    $("#qtd_notas").text(qtd);
    $("#div_notas").data("qtd-notas", qtd);
}

function zerarNotas(){
    $("#qtd_notas").text("0");
}

function limparCategorias()
{
    var qtd = parseInt($("#div_categorias").data("qtd-categorias"));

    if (qtd > 0){
        for (id = 1; id <= qtd; id++){
            $("#categoria_" + id).removeClass("selecao-click");
        }
    }
}

function selecionarNota(id)
{
    limparTexto();
    limparNotas();

    $("#nota_" + id).addClass("selecao-click");

    var nota_id = parseInt($("#nota_" + id).data("nota-id"));

    // Requisição para o servidor
    if (nota_id > 0){
        var token = $("#_token").val();
        $.get("index.php?control=texto&action=nota&nota_id=" + nota_id + '&_token=' + token, function(data, status){
            if (status === "success"){
                if (data === ''){
                    alert("Anotação não carregada.");
                } else {
                    montarTexto(data);
                }
            } else {
                alert("Não foi possível obter o texto");
            }
        });
    }
}

function limparNotas()
{
    var qtd = parseInt($("#div_notas").data("qtd-notas"));

    if (qtd > 0){
        for (id = 1; id <= qtd; id++){
            $("#nota_" + id).removeClass("selecao-click");
        }
    }
}

function limparTexto()
{
    $("#texto").text("");
}

function montarTexto(texto)
{
    limparTexto();
    $("#texto").html(texto);
}