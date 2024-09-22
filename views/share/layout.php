<?php
session_start();
include("models/usuario.php");
?>
<header class="header">
    <div>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <img src="assets/img/escudo.png" class="logo">
            </div>
            <div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <b>
                            <a class="nav-link white" href="/ClubeDeRegatasDoFlamengo/Entrar">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABEklEQVRIie3UMUoDYRDF8Z8psqUpLBRrBS+gx7ATD6E5iSjeQQ/gJUzEwoCgndhppWBCSmOxuyBBzXzmCyjsg9fsN8x/BnYejf6oCnTRx6hyH4fV20K0jgEm3/imqsmqYgb0Mzzr5t0AtPZBTvBVAriXEzxMAA8jDZeC4EnioDP7toKNRgnQt0hRFHyXAA7VRsFnCeDzhNqZKpQ3Grnjdk4wZSr9BF9IctVqKwOipzybIS6rb9k3bZRF0eRqYRu72MEWOtXbK+6VeX6Ba7zPO9gajvEsntVPOMLqb4AdnGKcAJz2GCdYjkI38TgHcNoP2IiAbzNCaw+mIV9l9UpkukSFeu4r/9Rc275gL+MSjf6JPgDX8rYJGKocvwAAAABJRU5ErkJggg=="> 
                                <?php
                                if (isset($_SESSION['logado'])):
                                    $user = unserialize($_SESSION['usuario']);
                                    echo $user->nome;
                                ?>
                                
                                <a class="nav-link white" href="controllers/logout.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAlUlEQVRIie2VwRFAMBBFHz0wdKQVyuXgTiEcBJkEsTacvJlczP59SYTAj5AKGIHp4RhMj1MGRXNbcspa9BQvnyqa3UIrqIFcEpBsUWNqO0sSzEsEGdCa+h4oYwtgmXnHvhIvnxwIrp7fZcu/fopcom+RRuC+5CK24PVjCv6HFl0QzH/+LxqdmUiH3eOQCt2dELxwfjxmsuV4pLbuQXgAAAAASUVORK5CYII="> Sair</a>
                                <?php
                                else:
                                ?>
                                    <p>Entrar</p>
                                <?php
                                endif;
                                ?>
                            </a>
                            </b>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="bg-dark navbar-expand-lg">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark ml-5 pl-5">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <b><a class="nav-link txt-la" href="/ClubeDeRegatasDoFlamengo/Home">Home</a></b>
                        </li>
                        <li class="nav-item active">
                            <b><a class="nav-link txt-la" href="/ClubeDeRegatasDoFlamengo/Painel">Despesas</a></b>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>