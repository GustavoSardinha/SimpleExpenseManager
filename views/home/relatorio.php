
<?php
    include("controllers/verificarLogin.php");
    include("models/despesa.php");
    if (isset($_SESSION['logado'])):
        $user = unserialize($_SESSION['usuario']);
        endif;
        if($_SESSION['cod'] != -1)
        {
            $desp = despesa::Buscar($user->cpf, $_SESSION['cod']);
        }
?>
<div class="home-bg">
    <br>
    <div class ="container">
        <h2 class="centralizar txt">Emitir relátorio</h2>
        <div class="form-group">
            <label for="InputData" class="txt">Data 1</label>
            <input name="data1" type="date" class="form-control" id="InputData1" aria-describedby="NameHelp">
        </div>
        <div class="form-group">
            <label for="InputData" class="txt">Data 2</label>
            <input name="data2" type="date" class="form-control" id="InputData2" aria-describedby="NameHelp">
        </div>
        <br>
        <button id="fla" class="form-control btn btn-dark btn-fla txt"><b>Buscar</b></button>
    </div>
    <br>
    <br>
    <div class="container area" id="table">
    </div>
    <br>
</div>
