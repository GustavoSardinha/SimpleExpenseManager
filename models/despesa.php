<?php

Class despesa
{
    
    public int $codigo = -1;
    public string $descricao;
    public string $dataDePagamento;
    public float $valor;
    public int $descricaoNum;
    public string $tipo;

    public function Get_Cod()
    {
        return $this->codigo;
    }
    public function Set_Cod(int $num)
    {
        if($num > 0 || $num == -1)
        {
            $this->codigo = $num;
            return true;
        }
        return false;
    }
    public static function Ler_Despesas($cpf)
    {
        include("database/conexao.php");
        $query = "SELECT d.codigo, dt.descricao, DATE_FORMAT(d.dataPagamento, '%d/%m/%Y') AS datapag , d.valor FROM despesa AS d, tipo_de_despesa AS dt, pessoa AS p WHERE d.codigoTipoDespesa = dt.codigo AND d.CPF = p.CPF AND p.CPF = '{$cpf}';";
        $result = mysqli_query($conexao, $query);
        $despesas = array(); 
        if($result == false){
            return $despesas;
        }
        try{
            while($obj = $result->fetch_object()){
                $despesa = new despesa();
                $despesa->codigo = $obj->codigo;
                $despesa->descricao = $obj->descricao;
                $despesa->dataDePagamento = $obj->datapag;
                $despesa->valor = $obj->valor;
                array_push($despesas, $despesa);
            }
        }
        catch(Exception $e){
            var_dump($e);
        }
        return $despesas;
    }
    public static function Tipos_De_Despesa()
    {
        include("database/conexao.php");
        $query = "SELECT * FROM tipo_de_despesa;";
        $result = mysqli_query($conexao, $query);
        $despesas = array(); 
        while($obj = $result->fetch_object()){
            $despesa = new despesa();
            $despesa->codigo = $obj->codigo;
            $despesa->descricao = $obj->descricao;
            array_push($despesas, $despesa);
        }
        return $despesas;
    }
    public function Salvar($cpf)
    {
        include("../database/conexao.php");
        if($this->codigo == - 1)
        {
            $query = "INSERT INTO despesa VALUES (DEFAULT, {$this->descricaoNum}, STR_TO_DATE( '{$this->dataDePagamento}', '%Y-%m-%d' ), {$this->valor}, '{$cpf}')";
            $result = mysqli_query($conexao, $query);
            return $result;
        }
        else
        {
            $query = "UPDATE despesa SET codigoTipoDespesa = {$this->descricaoNum}, dataPagamento = STR_TO_DATE( '{$this->dataDePagamento}', '%Y-%m-%d' ), valor = {$this->valor} WHERE codigo = {$this->codigo} AND cpf = '{$cpf}'";
            $result = mysqli_query($conexao, $query);
            return $result;
        }
    }
    public static function Excluir($cod, $cpf)
    {
        include("../database/conexao.php");
        $query = "DELETE FROM despesa WHERE codigo = {$cod} AND cpf = '{$cpf}'";
        $result = mysqli_query($conexao, $query);
        return $result;
    }
    public static function Buscar($cpf, $cod)
    {
        include("database/conexao.php");
        $query = "SELECT d.codigoTipoDespesa, DATE_FORMAT(d.dataPagamento, '%d/%m/%Y') AS datapag, d.valor FROM despesa AS d, tipo_de_despesa AS td WHERE d.codigoTipoDespesa = td.codigo AND d.codigo = {$cod} AND d.cpf = '{$cpf}'";
        $result = mysqli_query($conexao, $query);
        $despesa = new despesa();
        while($obj = $result->fetch_object()){
            $despesa->codigo = $cod;
            $despesa->descricaoNum = $obj->codigoTipoDespesa;
            $despesa->dataDePagamento = $obj->datapag;
            $despesa->valor = $obj->valor;
        }
        return $despesa;
    }
    public static function CadastrarTipo($descricao)
    {
        include("../database/conexao.php");
        $query = "INSERT INTO tipo_de_despesa VALUES(DEFAULT, '{$descricao}')";
        $result = mysqli_query($conexao, $query);
        return $result;
    }
    public static function BuscarDespesaPorMes($data1, $data2, $cpf){
        include("../database/conexao.php");
        $query = "SELECT d.codigo, DATE_FORMAT(d.dataPagamento, '%d/%m/%Y') AS datapag, d.valor, td.descricao  FROM despesa AS d, tipo_de_despesa AS td WHERE d.dataPagamento BETWEEN '{$data1}' and '{$data2}' AND d.cpf = '{$cpf}' AND d.codigoTipoDespesa = td.codigo;";
        $result = mysqli_query($conexao, $query);
        $despesas = array();
        while($obj = $result->fetch_object()){
            $despesa = new despesa();
            $despesa->codigo = $obj->codigo;
            $despesa->descricao = $obj->descricao;
            $despesa->dataDePagamento = $obj->datapag;
            $despesa->valor = $obj->valor;
            array_push($despesas, $despesa);
        }
        return $despesas;
    }
    public static function BuscarTipodeDespesaPorMes($data1, $data2, $cpf)
    {
        include("../database/conexao.php");
        include("tipo_despesa.php");
        $query = "SELECT descricao, SUM(valor) as soma FROM tipo_de_despesa AS t, despesa AS d WHERE t.codigo = d.codigoTipoDespesa AND d.CPF = '12345678' AND d.dataPagamento BETWEEN '{$data1}' AND '{$data2}' GROUP BY d.codigoTipoDespesa";
        $result = mysqli_query($conexao, $query);
        $tiposdedespesas = array();
        while($obj = $result->fetch_object()){
            $tipodedespesa = new tipo_despesa();
            $tipodedespesa->descricao = $obj->descricao;
            $tipodedespesa->valor = $obj->soma;
            array_push($tiposdedespesas, $tipodedespesa);
        }
        return $tiposdedespesas;
    }
    public static function BuscarTipoPorMes($tipo, $data1, $data2, $cpf)
    {
        include("../database/conexao.php");
        include("tipo_despesa.php");
        $query = "SELECT MONTH(d.dataPagamento) as mes, SUM(valor) as soma FROM tipo_de_despesa AS t, despesa AS d  WHERE t.codigo = d.codigoTipoDespesa AND d.CPF = '{$cpf}' AND d.dataPagamento BETWEEN '{$data1}' AND '{$data2}' AND t.codigo = '{$tipo}' GROUP BY MONTH(d.dataPagamento)";
        $result = mysqli_query($conexao, $query);
        $tiposdedespesas = array();
        $query2 = "SELECT descricao FROM tipo_de_despesa WHERE codigo = {$tipo}";
        $result2 = mysqli_query($conexao, $query2);
        $obj2 = $result->fetch_object();
        while($obj = $result->fetch_object()){
            $tipodedespesa = new tipo_despesa();
            $tipodedespesa->mes = $obj->mes;
            $tipodedespesa->valor = $obj->soma;
            array_push($tiposdedespesas, $tipodedespesa);
        }
        return $tiposdedespesas;
    }
}
?>