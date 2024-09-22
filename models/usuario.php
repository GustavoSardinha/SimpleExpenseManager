<?php
Class usuario
{
    public $nome;
    public $cpf;
    public $senha;
    private int $row = 0;

    private bool $admin;

    public function set_Adm(int $num)
    {
        if($num == 1){
            $this->admin = true;
        }
        else
        {
            $this->admin = false;
        }
    }
    public function Get_Adm()
    {
        return $this->admin;
    }
    public function Get_num_of_rows()
    {
        return $this->row;
    }
    public static function Buscar($cpf, $snh)
    {
        include('../database/conexao.php');
        $usuario = mysqli_real_escape_string($conexao, $cpf);
        $senha = mysqli_real_escape_string($conexao, $snh);

        $query = "SELECT * FROM Pessoa WHERE cpf = '{$usuario}' AND senha = md5('{$senha}')";
        $result = mysqli_query($conexao, $query);
        $rows = mysqli_num_rows($result);
        $user = new usuario();
        if($rows = 1)
        {
            while($obj = $result->fetch_object()){
                $user->nome =$obj->Nome;
                $user->cpf =$obj->CPF;
                $user->admin=$obj->Adminstrador;
                $user->row = $rows;
            }
        }
        return $user;
    }
    public static function BuscarPorCPF($cpf)
    {
        include('../database/conexao.php');
        $cpf = mysqli_real_escape_string($conexao, $cpf);

        $query1 = "SELECT * FROM pessoa WHERE CPF = '{$cpf}'";
        $result1 = mysqli_query($conexao, $query1);
        $row = mysqli_num_rows($result1);
        return $row;
    }
    public function Salvar()
    {
        include('../database/conexao.php');
        $query = "INSERT INTO pessoa VALUES ('{$this->cpf}', '{$this->nome}', md5('{$this->senha}'), '{$this->admin}');";
        $result = mysqli_query($conexao, $query);
        return $result;
    }
    public function AlterarSenha($senhaAntiga)
    {
        include('../database/conexao.php');
        $query = "UPDATE pessoa SET senha = md5('{$this->senha}') WHERE cpf = '{$this->cpf} AND senha = '{$senhaAntiga}'";
        $result = mysqli_query($conexao, $query);
        return $result;
    }
}
?>