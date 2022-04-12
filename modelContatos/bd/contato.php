<?php

require_once('conexaoMysql.php');

function insertContato($dadosContato)
{
    $statusResposta = (boolean) false;

    $conexao = conexaoMysql();

    $sql = "insert into tblcontatos
                (nome, 
                telefone, 
                celular, 
                email)

            values
                ('".$dadosContato['nome']."',  
                 '".$dadosContato['telefone']."', 
                 '".$dadosContato['celular']."', 
                 '".$dadosContato['email']."');";

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

    fecharConexaoMysql($conexao);
    return $statusResposta;
    
}

function deleteContato($id)
{
    //declaracao de variavel para utilizar no return desta função
    $statusResposta = (boolean) false;

    //abre a conexão com o BD
    $conexao = conexaoMysql();

    //script para deletar um registro no BD
    $sql = "delete from tblcontatos where idcontato=".$id;

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

function selectAllContatos()
{
    $conexao = conexaoMysql();

    $sql = "select * from tblcontatos order by idcontato desc";

    $result = mysqli_query($conexao, $sql);

    if($result)
    {
        $cont = 0;
        while ($rsDados = mysqli_fetch_assoc($result))
        {
            $arrayDados [$cont] = array(
                "id"          => $rsDados['idcontato'],
                "nome"        => $rsDados['nome'],
                "telefone"    => $rsDados['telefone'],
                "celular"     => $rsDados['celular'],
                "email"       => $rsDados['email']
            );
            $cont++;
        }
        fecharConexaoMysql($conexao);

        return $arrayDados;

    }
}

?>