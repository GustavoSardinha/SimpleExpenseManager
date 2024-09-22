<?php
    include("controllers/verificarLogout.php");
?>
<article class="conteudo">
    <br>
    <div class="container">
        <div class="container">
            <h1 class="centralizar txt">Fazer login</h1>
            <form action ="controllers/logar.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="txt">CPF</label>
                    <input name="cpf" type="text" class="cpf form-control input-txt" id="CPFInput" maxlength="11" oninput="criaMascara('CPF')" aria-describedby="NameHelp" placeholder="Digite seu CPF">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="txt">Senha</label>
                    <input name="password" type="password" class="pass form-control input-txt" id="exampleInputPassword1" placeholder="Digite sua senha">
                    <img class="eye" onclick="eye(0)" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABbElEQVRIie3VsUocURTG8Z/RXhJSJKaws4iChWmWVSGYOoVdGkkliG9gXsBqnyOQhdSpgpsoKtrFMooQBJt0ksK4Wuy5Og66O6u7i8h+8DFw5p7zP3Pv4Q599fXYNNDG2lF8wDu8xrOI/8UeaviKX51qbgZrqOO8gGso3wf4El8KwvKu4zNetAudxdEdoVkfY64o9CNOOwBNPsVCK+iS4mfZjs+weBv0Pf53AZqFz+eh4zjpIjT5BBNZ8E4PoMm78CTAQzftfZd0jVXS2UluNuGlfCcrPQB/ykOf4mcPwNt4ngVvxYsDVLsArEbtBL/Ud43JfqXxx6p0EFqJmiPBqHE1YW9zWz8cz7qryW9XKXc4GjjCm2YJU5H0D5NYxmGBL0s+jJzJqFGPmi01ht+RnLQaRXfwDfsZ0H7E0iW0mslbjlpjRcA3KQ3GdCaWwEnlTCMtVfTG+qNxRutN1mxgE4MFa95ZP8SE9vWgdQGKGFg3UeGEGwAAAABJRU5ErkJggg==">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input red" id="exampleCheck1">
                    <label class="form-check-label txt" for="exampleCheck1">Manter-me conectado</label>
                </div>
                <br>
                <button type="submit" class="form-control btn btn-dark btn-fla txt"><b>Entrar</b></button>
            </form>
            <br>
            <div class="text-center">
                <p class="txt">Não tem conta? <a class="link" href="/ClubeDeRegatasDoFlamengo/Cadastro">Cadastrar-se aqui</a></p>
            </div>
            <br>
            <?php
                if (isset($_SESSION['login'])):
                ?>
                <p class = 'mensagem bg-danger'>Usuário ou senha inválidos!</p>
                <?php
                endif;
                unset($_SESSION['login']);
                ?>
        </div>
    </div>
    <br>
</article>