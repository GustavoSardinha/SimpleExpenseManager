<?php
    include("controllers/verificarLogin.php");
    if (isset($_SESSION['logado'])):
        $user = unserialize($_SESSION['usuario']);
        endif;
?>
<div class="profile">
    <br>
    <div class="container area">
        <br>
        <h2 class="centralizar">Dados pessoais</h2>
        <div>
        <?php
            echo '<p>CPF <p class="text-muted">'.$user->cpf.'</p></p>';
        ?>
        </div>
        <div>
        <?php
            echo '<p>Nome completo <p class="text-muted">'.$user->nome.'</p></p>';
        ?>
        </div>
        <br>
    </div>
    <br>
</div>
