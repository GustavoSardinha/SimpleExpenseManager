console.log("123");
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
    var tipodedespesas = new Array();
    var soma = 0;
    $("#table").html("");
    var data1Valor = $("#InputData1").val();
    var data2Valor = $("#InputData2").val();
    var tipoValor = $("#InputTipo").val();
    console.log(data2Valor);
    if(data1Valor != "" && data2Valor != "")
    {
        $.post("/ClubeDeRegatasDoFlamengo/controllers/buscarDespesas.php",
        {
            data1: data1Valor,
            data2: data2Valor
        },
        function(data, status)
        {
            if(data.length > 0){
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

        $.post("/ClubeDeRegatasDoFlamengo/controllers/buscarTipodeDespesas.php",
        {
            data1: data1Valor,
            data2: data2Valor
        },
        function(data, status)
        {
            console.log(data)
            if(data.length > 0){
                var dados = data.split('*');
                dados.forEach(dado => {
                    var tipodedespesa = JSON.parse(dado);
                    tipodedespesas.push(tipodedespesa);
                });
                console.log(tipodedespesas);
                google.charts.load('current', {'packages':['corechart']});

                google.charts.setOnLoadCallback(drawChart);
          
                function drawChart() {
          
                  var data = new google.visualization.DataTable();
                  data.addColumn('string', 'Topping');
                  data.addColumn('number', 'Slices');
                  tipodedespesas.forEach(tipodedespesa => {
                    data.addRows([
                        [tipodedespesa.descricao, tipodedespesa.valor]
                      ]);
                    });
          
                  var options = {'title':'Total de Gastos',
                                 'width': document.getElementById('chart_div').width,
                                 'height':300};
          
                  // Instantiate and draw our chart, passing in some options.
                  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                  chart.draw(data, options);
                }
            }
        });
        $.post("/ClubeDeRegatasDoFlamengo/controllers/buscarTipo.php",
        {
            tipo: tipoValor,
            data1: data1Valor,
            data2: data2Valor
        },
        function(data, status)
        {
            console.log(data)
            var tipodedespesas1 = new Array();
            if(data.length > 0){
                var dados = data.split('*');
                dados.forEach(dado => {
                    var tipodedespesa = JSON.parse(dado);
                    tipodedespesas1.push(tipodedespesa);
                });
                console.log(tipodedespesas1);
                }
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: "style" } ],
                    ["Copper", 8.94, "#b87333"],
                    ["Silver", 10.49, "silver"],
                    ["Gold", 19.30, "gold"],
                    ["Platinum", 21.45, "color: #e5e4e2"]
                  ]);
            
                  var view = new google.visualization.DataView(data);
                  view.setColumns([0, 1,
                                   { calc: "stringify",
                                     sourceColumn: 1,
                                     type: "string",
                                     role: "annotation" },
                                   2]);
            
                  var options = {
                    title: "Density of Precious Metals, in g/cm^3",
                    width: 600,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                  };
                  var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                  chart.draw(view, options);
        }});
    }
    else
    {
        alert("Informe todos os campos!");
    }
    });