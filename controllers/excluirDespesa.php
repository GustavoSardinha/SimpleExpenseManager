<?php
session_start();
include("../models/usuario.php");
include("../models/despesa.php");
if (isset($_SESSION['logado'])):
    $user = unserialize($_SESSION['usuario']);
    despesa::Excluir($_GET['cod'], $user->cpf);
    header('Location: /ClubeDeRegatasDoFlamengo/Painel');
    exit();
endif;
?>