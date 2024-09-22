<?php
    include("controllers/verificarLogin.php");
    if (isset($_SESSION['logado'])):
        $user = unserialize($_SESSION['usuario']);
        endif;
    if($user->Get_Adm() != 1){
        header('Location: /ClubeDeRegatasDoFlamengo/Home');
        exit();
    }
?>
<div class="profile">
    <br>
    <div class="container">
        <?php
        if (isset($_SESSION['descricao'])):
            if($_SESSION['descricao']):
        ?>
        <br>
        <p class = 'mensagem bg-success'>Tipo criado com sucesso!</p>
        <?php
        else:
        ?>
        <br>
        <p class = 'mensagem bg-danger'>Preencha o campo descrição!</p>
        <?php
            endif;
        endif;
        unset($_SESSION['descricao']);
        ?>
        <form action="/ClubeDeRegatasDoFlamengo/controllers/cadastrarTipo.php" method="POST">
            <h2 class="centralizar txt">Crie um novo tipo de despesa</h2>
            <div class="form-group">
                <label for="exampleInputEmail1" class="txt">Descrição</label>
                <input name="descricao" type="text" class="form-control input-txt" id="exampleInputName1" aria-describedby="NameHelp" placeholder="Digite a descrição">
            </div>
            <br>
            <button type="submit" class="form-control btn btn-dark btn-fla txt"><b>Salvar</b></button>
        </form>
    </div>
    <br>
</div>