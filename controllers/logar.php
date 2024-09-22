<?php
include("../models/usuario.php");
session_start();

if(empty($_POST['cpf']) || empty($_POST['password'])){
    header('Location: /ClubeDeRegatasDoFlamengo/Entrar');
    exit();
}
$user = usuario::Buscar($_POST['cpf'],  $_POST['password']);
var_dump($user);

if($user->Get_num_of_rows() == 1){
    $_SESSION['usuario'] = serialize($user);
    $_SESSION['logado'] = true;
    $_SESSION['cod'] = -1;
    header('Location: /ClubeDeRegatasDoFlamengo/Home');
    exit();
}
else{
    $_SESSION['login'] = false;
    header('Location: /ClubeDeRegatasDoFlamengo/Entrar');
    exit();
}
?>