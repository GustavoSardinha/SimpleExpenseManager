<?php
if (!isset($_SESSION['logado']) ){
    header('Location: /ClubeDeRegatasDoFlamengo/Entrar');
    exit();
}
?>