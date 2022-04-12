<?php

const SERVER = 'localhost';
const USER = 'root';
const PASSWORD = 'bcd127';
const DATABASE = 'contatos';

$resultado = conexaoMysql();

function conexaoMysql()
{
    $conexao = array();

    $conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    if($conexao)
        return $conexao;
    else
        return false;

}

    function fecharConexaoMysql($conexao)
    {
        mysqli_close($conexao);
    }


?>