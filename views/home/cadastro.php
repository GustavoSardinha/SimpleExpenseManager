<?php
    include("controllers/verificarLogout.php");
?>
<article class="conteudo">
    <br>
    <div class="container">
        <div class="container">
            <h1 class="centralizar txt">Cadastre-se</h1>
            <?php
                if (isset($_SESSION['cadastrado'])):
                ?>
                <p class = 'mensagem bg-danger'>CPF já cadastrado!</p>
                <?php
                endif;
                unset($_SESSION['cadastrado']);
                ?>
                <?php
                if (isset($_SESSION['sucesso'])):
                ?>
                <p class = 'mensagem bg-success'>Usuário cadastrado com sucesso!</p>
                <?php
                endif;
                unset($_SESSION['sucesso']);
                ?>
                <?php
                if (isset($_SESSION['senharuim'])):
                ?>
                <p class = 'mensagem bg-danger'>Senha inválida, por favor digite uma senha de 6 a 8 digitos!</p>
                <?php
                endif;
                unset($_SESSION['senharuim']);
                ?>
            <form action ="controllers/cadastrar.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1" class="txt">Nome</label>
                <input name="nome" type="text" class="form-control input-txt" id="exampleInputName1" aria-describedby="NameHelp" placeholder="Digite seu nome completo">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="txt">CPF</label>
                <input name="cpf" type="text"  class="form-control input-txt" id="CPFInput" maxlength="11" oninput="criaMascara('CPF')" aria-describedby="CPFHelp" placeholder="Digite seu CPF">
            </div>
            <div class="form-group senha">
                <label for="exampleInputPassword1" class="txt">Senha</label>
                <input name="password" type="password" class="pass form-control input-txt" id="exampleInputPassword1" placeholder="Digite sua senha">
                <img class="eye" onclick="eye(0)" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABbElEQVRIie3VsUocURTG8Z/RXhJSJKaws4iChWmWVSGYOoVdGkkliG9gXsBqnyOQhdSpgpsoKtrFMooQBJt0ksK4Wuy5Og66O6u7i8h+8DFw5p7zP3Pv4Q599fXYNNDG2lF8wDu8xrOI/8UeaviKX51qbgZrqOO8gGso3wf4El8KwvKu4zNetAudxdEdoVkfY64o9CNOOwBNPsVCK+iS4mfZjs+weBv0Pf53AZqFz+eh4zjpIjT5BBNZ8E4PoMm78CTAQzftfZd0jVXS2UluNuGlfCcrPQB/ykOf4mcPwNt4ngVvxYsDVLsArEbtBL/Ud43JfqXxx6p0EFqJmiPBqHE1YW9zWz8cz7qryW9XKXc4GjjCm2YJU5H0D5NYxmGBL0s+jJzJqFGPmi01ht+RnLQaRXfwDfsZ0H7E0iW0mslbjlpjRcA3KQ3GdCaWwEnlTCMtVfTG+qNxRutN1mxgE4MFa95ZP8SE9vWgdQGKGFg3UeGEGwAAAABJRU5ErkJggg==">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="txt">Confirme sua senha</label>
                <input name="password_confirm" type="password" class="pass form-control input-txt" id="exampleInputPassword1" placeholder="Digite sua senha">
                <img class="eye" onclick="eye(1)" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABbElEQVRIie3VsUocURTG8Z/RXhJSJKaws4iChWmWVSGYOoVdGkkliG9gXsBqnyOQhdSpgpsoKtrFMooQBJt0ksK4Wuy5Og66O6u7i8h+8DFw5p7zP3Pv4Q599fXYNNDG2lF8wDu8xrOI/8UeaviKX51qbgZrqOO8gGso3wf4El8KwvKu4zNetAudxdEdoVkfY64o9CNOOwBNPsVCK+iS4mfZjs+weBv0Pf53AZqFz+eh4zjpIjT5BBNZ8E4PoMm78CTAQzftfZd0jVXS2UluNuGlfCcrPQB/ykOf4mcPwNt4ngVvxYsDVLsArEbtBL/Ud43JfqXxx6p0EFqJmiPBqHE1YW9zWz8cz7qryW9XKXc4GjjCm2YJU5H0D5NYxmGBL0s+jJzJqFGPmi01ht+RnLQaRXfwDfsZ0H7E0iW0mslbjlpjRcA3KQ3GdCaWwEnlTCMtVfTG+qNxRutN1mxgE4MFa95ZP8SE9vWgdQGKGFg3UeGEGwAAAABJRU5ErkJggg==">
            </div>
            <br>
            <button type="submit" class="form-control btn btn-dark btn-fla txt"><b>Cadastrar</b></button>
            </form>
            <br>
            <div class="text-center">
                <p class="txt">Já tem conta? <a class="link" href="/ClubeDeRegatasDoFlamengo/Entrar">Faça login aqui</a></p>
            </div>
            <br>
        </div>
    </div>
    <br>
</article>