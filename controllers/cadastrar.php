<?php
session_start();
include("../models/usuario.php");
if(empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['password'])){
    header('Location: /ClubeDeRegatasDoFlamengo/Cadastro');
    exit();
}
$row = usuario::BuscarPorCPF($_POST['cpf']);
if($row == 1){
    $_SESSION['cadastrado'] = true;
}else{
    if(strlen($_POST['password']) <= 8 and strlen($_POST['password']) >= 6){
        $user = new usuario();
        $user->nome = $_POST['nome'];
        $user->cpf = $_POST['cpf'];
        $user->senha = $_POST['password'];
        $user->set_Adm(0);
        $user->Salvar();
        $_SESSION['sucesso'] = true;
    }else{
        $_SESSION['senharuim'] = true;
    }
}
header('Location: /ClubeDeRegatasDoFlamengo/Cadastro');
exit();
?>