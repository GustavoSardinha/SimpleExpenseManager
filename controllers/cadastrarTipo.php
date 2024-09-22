<?php
include("../models/usuario.php");
session_start();
if (isset($_SESSION['logado'])):
    $user = unserialize($_SESSION['usuario']);
    var_dump($user);
    include("../models/despesa.php");
    if(empty($_POST['descricao'])){
        $_SESSION['descricao'] = false;
        header('Location: /ClubeDeRegatasDoFlamengo/Adm');
        exit();
    }
    despesa::CadastrarTipo($_POST['descricao']);
    $_SESSION['descricao'] = true;
    header('Location: /ClubeDeRegatasDoFlamengo/Adm');
    exit();
endif;
?>