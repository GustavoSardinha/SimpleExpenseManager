<?php
session_start();
if (isset($_SESSION['logado'])):
    $_SESSION['cod'] = -1;
    header('Location: /ClubeDeRegatasDoFlamengo/Adicionar');
    exit();
endif;
?>