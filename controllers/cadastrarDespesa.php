<?php
include("../models/usuario.php");
session_start();
if (isset($_SESSION['logado'])):
    $user = unserialize($_SESSION['usuario']);
    var_dump($user);
    include("../models/despesa.php");
    if(empty($_POST['descricao']) || empty($_POST['data']) || empty($_POST['valor'])){
        $_SESSION['despesa'] = false;
        header('Location: /ClubeDeRegatasDoFlamengo/Adicionar');
        exit();
    }
    $_SESSION['cod'] = -1;
    $despesa = new despesa();
    $despesa->Set_Cod($_POST['cod']);
    $despesa->descricaoNum = $_POST['descricao'];
    $despesa->dataDePagamento = $_POST['data'];
    $despesa->valor = $_POST['valor'];
    var_dump($despesa);
    $despesa->Salvar($user->cpf);
    $_SESSION['despesa'] = true;
    header('Location: /ClubeDeRegatasDoFlamengo/Adicionar');
    exit();
endif;
?>