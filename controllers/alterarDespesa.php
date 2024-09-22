<?php
session_start();
if (isset($_SESSION['logado'])):
    $_SESSION['cod'] = $_GET['cod'];
    header('Location: /ClubeDeRegatasDoFlamengo/Adicionar');
    exit();
endif;
?>