<?php
    include("controllers/verificarLogin.php");
    include("models/despesa.php");
    if (isset($_SESSION['logado'])):
      $user = unserialize($_SESSION['usuario']);
      $despesas = despesa::Ler_Despesas($user->cpf);
      endif;
?>
<div class="wall">
<br>
<div class="container area">
<h2 class="centralizar">Despesas</h2>
<br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Descrição</th>
        <th scope="col">Data de Pagamento</th>
        <th scope="col">Valor</th>
        <th scope="col">Alterar</th>
        <th scope="col">Apagar</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($despesas as $despesa){
          echo '<tr>';
          echo '<th scope="row">'.$despesa->Get_Cod() .'</th>';
          echo '<td>'.$despesa->descricao.'</td>';
          echo '<td>'.$despesa->dataDePagamento.'</td>';
          echo '<td> R$ '.number_format($despesa->valor,2,",",".").'</td>';
          echo '<td><a href="/ClubeDeRegatasDoFlamengo/controllers/alterarDespesa.php?cod='.$despesa->Get_Cod().'" class="btn btn-primary">Alterar</a></td>';
          echo '<td><button onclick="confirmar('.$despesa->Get_Cod().')" class="btn btn-danger">Excluir</button></td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>
  <div>
  <div class="centralizar">
    <a class="btn btn-success form-control" href="/ClubeDeRegatasDoFlamengo/controllers/add.php">Adicionar</a>
  </div>
  <br>
  </div>
</div>
<br>
</div>