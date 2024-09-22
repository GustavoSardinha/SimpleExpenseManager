<?php
session_start();
include("../models/usuario.php");
include("../models/despesa.php");
if (isset($_SESSION['logado'])):
    $user = unserialize($_SESSION['usuario']);

if(empty($_POST['data1']) || empty($_POST['data2'])){
    header('Location: /ClubeDeRegatasDoFlamengo/Relatorio');
    exit();
}

$despesas = despesa::BuscarDespesaPorMes($_POST['data1'], $_POST['data2'], $user->cpf);
for($i = 0; $i < count($despesas); $i++){
    echo json_encode($despesas[$i]);
    if($i + 1 != count($despesas))
        echo '*';
}

endif;
?>