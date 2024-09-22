<?php
    include("controllers/verificarLogin.php");
    include("models/despesa.php");
    if (isset($_SESSION['logado'])):
        $user = unserialize($_SESSION['usuario']);
        $despesas = despesa::Tipos_De_Despesa();
        endif;
        if($_SESSION['cod'] != -1)
        {
            $desp = despesa::Buscar($user->cpf, $_SESSION['cod']);
        }
        
            function dateFormat($date)
            {
                $m = preg_replace('/[^0-9]/', '', $date);
                if (preg_match_all('/\d{2}+/', $m, $r)) {
                    $r = reset($r);
                    if (count($r) == 4) {
                        if ($r[2] <= 12 && $r[3] <= 31) return "$r[0]$r[1]-$r[2]-$r[3]"; // Y-m-d
                        if ($r[0] <= 31 && $r[1] != 0 && $r[1] <= 12) return "$r[2]$r[3]-$r[1]-$r[0]"; // d-m-Y
                        if ($r[0] <= 12 && $r[1] <= 31) return "$r[2]$r[3]-$r[0]-$r[1]"; // m-d-Y
                        if ($r[2] <= 31 && $r[3] <= 12) return "$r[0]$r[1]-$r[3]-$r[2]"; //Y-m-d
                    }

                    $y = $r[2] >= 0 && $r[2] <= date('y') ? date('y') . $r[2] : (date('y') - 1) . $r[2];
                    if ($r[0] <= 31 && $r[1] != 0 && $r[1] <= 12) return "$y-$r[1]-$r[0]"; // d-m-y
                }
            }
        function verifyDate($d){
            if($_SESSION['cod'] != -1)
            {
                $data = dateFormat($d->dataDePagamento);
                return $data;
            }
        }
        function verifyValue($d){
            if($_SESSION['cod'] != -1)
            {
                return $d->valor;
            }
        }
?>
<div class="profile">
<br>
<div class="container">
    <h2 class="centralizar txt">Crie ou altere uma despesa</h2>
    <?php
    if (isset($_SESSION['despesa'])):
        if($_SESSION['despesa']):
    ?>
    <br>
    <p class = 'mensagem bg-success'>Alteração realizada com sucesso!</p>
    <?php
    else:
    ?>
    <br>
    <p class = 'mensagem bg-danger'>Preencha todos os campos!</p>
    <?php
        endif;
    endif;
    unset($_SESSION['despesa']);
    ?>
    <form action ="controllers/cadastrarDespesa.php" method="POST">
        <div class="form-group">
            <?php
            echo '<input name="cod" hidden value="'.$_SESSION['cod'].'">'
            ?>
            <label for="inlineFormCustomSelect" class="txt">Descrição</label>
            <select name="descricao" class="custom-select form-control mr-sm-2" id="inlineFormCustomSelect">
                <?php
                    foreach ($despesas as $despesa)
                    {
                        if($_SESSION['cod'] != -1)
                        {
                            if($desp->descricaoNum == $despesa->Get_Cod())
                            {
                                echo '<option value="'.$despesa->Get_Cod().'" selected>'.$despesa->descricao.'</option>'; 
                            }
                            else
                            {
                                echo '<option value="'.$despesa->Get_Cod().'">'.$despesa->descricao.'</option>'; 
                            }
                        }
                        else
                        {
                            echo '<option value="'.$despesa->Get_Cod().'">'.$despesa->descricao.'</option>'; 
                        }
                    }
                ?>  
            </select>
            <div class="form-group">
                <label for="exampleInputData" class="txt">Data</label>
                <?php
                if($_SESSION['cod'] != -1){
                    echo '<input name="data" type="date" class="form-control" id="exampleInputData" aria-describedby="NameHelp" value="'.verifyDate($desp).'">';
                }
                else
                {
                    echo '<input name="data" type="date" class="form-control" id="exampleInputData" aria-describedby="NameHelp">';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="exampleInputValor" class="txt">Valor</label>
                <?php
                if($_SESSION['cod'] != -1)
                {
                    echo '<input name="valor" type="number" class="form-control" id="exampleInputValor" aria-describedby="NameHelp" value="'.verifyValue($desp).'">';
                }
                else
                {
                    echo '<input name="valor" type="number" class="form-control" id="exampleInputValor" aria-describedby="NameHelp">';
                }
                
                ?>
            </div>
            <br>
            <button type="submit" class="form-control btn btn-dark btn-fla txt"><b>Salvar</b></button>
        </div>
    </form>
</div>
<br>
</div>