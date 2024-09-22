
<?php
    include("controllers/verificarLogin.php");
?>
<div class="home-bg">
    <br>
    <h1 class="centralizar txt">Olá, 
    <?php
    if (isset($_SESSION['logado'])):
    $user = unserialize($_SESSION['usuario']);
    echo $user->nome;
    endif;
    ?> 
    </h1>
    <div class="container">
        <table>
            <tbody>
                <td>
                    <tr>
                        <a href="/ClubeDeRegatasDoFlamengo/Adicionar" class="form-control btn btn-dark btn-fla menu">Adicionar despesas</a>
                    </tr>
                </td>
                <td>
                    <tr>
                        <a href="/ClubeDeRegatasDoFlamengo/Painel" class="form-control btn btn-dark btn-fla menu">Gerenciar despesas</a>
                    </tr>
                    <tr>
                        <a href="/ClubeDeRegatasDoFlamengo/Relatorio" class="form-control btn btn-dark btn-fla menu">Emitir relátorio</a>
                    </tr>
                    <tr>
                        <a href="/ClubeDeRegatasDoFlamengo/Perfil" class="form-control btn btn-dark btn-fla menu">Perfil</a>
                    </tr>
                    <?php
                        if($user->Get_Adm() == 1){
                            echo'<tr>';
                                echo '<a href="/ClubeDeRegatasDoFlamengo/Adm" class="form-control btn btn-dark btn-fla menu">Administração</a>';
                            echo '</tr>';
                        }
                    ?>
                </td>
            </tbody>
        </table>
    </div>
    <br>
</div>