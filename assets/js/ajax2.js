function formatNumber(number)
{
    number = number.toFixed(2) + '';
    x = number.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

$("#fla").click(function(){
    var despesas = new Array();
    var soma = 0;
    $("#table").html("");
    var mesValor = $("#Mes").val();
    var anoValor = $("#Ano").val();
    if(mesValor != "" && anoValor != "")
    {
        $.post("/ClubeDeRegatasDoFlamengo/controllers/buscarDespesas.php",
        {
            mes: mesValor,
            ano: anoValor
        },
        function(data, status)
        {
            if(data.length > 0){
                console.log("here");
                var dados = data.split('*');
                dados.forEach(dado => {
                    var despesa = JSON.parse(dado);
                    despesas.push(despesa);
                });
                var tabela = "<table class='table'> <thead><tr><th scope='col'>Código</th><th scope='col'>Descrição</th><th scope='col'>Data de Pagamento</th><th scope='col'>Valor</th><th scope='col'>Alterar</th><th scope='col'>Apagar</th> </tr> </thead>";
                for (let index = 0; index < despesas.length; index++) 
                {
                    soma += despesas[index]["valor"];
                    if(index == 0)
                    {
                        tabela += "<tbody>";
                    }
                    tabela += "<tr><th scope='row'>"+ despesas[index]["codigo"] + "</th><td>"+ despesas[index]["descricao"]+"</td><td>"+ despesas[index]["dataDePagamento"]+"</td><td> R$ "+ formatNumber(despesas[index]["valor"]) + "</td><td><a href='/ClubeDeRegatasDoFlamengo/controllers/alterarDespesa.php?cod="+ despesas[index]["codigo"] +"' class='btn btn-primary'>Alterar</a></td><td><button onclick='confirmar("+ despesas[index]["codigo"] +")' class='btn btn-danger's>Excluir</button></td></tr>";
                    if(index + 1 == despesas.length)
                    {
                        tabela += "</tbody></table>";
                        tabela += "<p class='centralizar'><b>A soma dos gastos neste mês é: R$ "+ formatNumber(soma) +"</b></p>"
                    }
                }
                $("#table").append(tabela);
            }
            else
            {
                console.log("here2");
                $("#table").html("<div class='centralizar'>Nenhum registro foi encontrado nesse período!</div>");
            }
        });
    }
    else
    {
        alert("Informe todos os campos!");
    }
    });