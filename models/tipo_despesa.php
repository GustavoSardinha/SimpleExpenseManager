<?php
Class tipo_despesa
{
    public string $descricao;
    public int $quantidade;
    public float $valor;
    public int $mes;
    public function Get_Quantidade()
    {
        return $this->quantidade;
    }
    public function Set_Quantidade($value)
    {
        if($value >= 0)
        {
            $quantidade = $value;
            return true;
        }
        return false;
    }
}
?>