<?php

require_once('conexaoMysql.php');

function insertCategoria($dadosCategoria)
{
    $statusResposta = (boolean) false;

    $conexao = conexaoMysql();

    $sql = "insert into tblcategoria (nomecategoria)
            values ('".$dadosCategoria['nomecategoria']."');";

    if(mysqli_query($conexao, $sql))
       {
           if(mysqli_affected_rows($conexao))
           $statusResposta= true;

           else
           $statusResposta= false;
       }
    else
    {
        $statusResposta= false;
    }

    fecharConexaoMysql(($conexao));
    return $statusResposta;
}

function deleteCategoria($id)
{
    //declaracao de variavel para utilizar no return desta função
    $statusResposta = (boolean) false;

    //abre a conexão com o BD
    $conexao = conexaoMysql();

    //script para deletar um registro no BD
    $sql = "delete from tblcategoria where idcategoria=".$id;

    //valida se o script esta correto, sem erro de sintaxe e executa no BD
    if(mysqli_query($conexao, $sql))
    {
        //valida se o BD teve sucesso na execução do script
        if(mysqli_affected_rows($conexao))
            $statusResposta = true;
    } 
    
    //fechar a conexão com o BD mysql
    fecharConexaoMysql($conexao);
    return $statusResposta;
        
}

function selectAllCategoria()
{
    $conexao = conexaoMysql();

    $sql = "select * from tblcategoria order by idcategoria desc";

    $result = mysqli_query($conexao, $sql);

    if($result)
    {
        $cont = 0;
        while ($rsDados = mysqli_fetch_assoc($result))
        {
            $arrayDados [$cont] = array(
                "id"          => $rsDados['idcategoria'],
                "nome"        => $rsDados['nomecategoria']
            );
            $cont++;
        }
        fecharConexaoMysql($conexao);

        return $arrayDados;

    }
}


?>