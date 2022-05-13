<?php

require_once('conexaoMysql.php');

function insertCrud($dadosCrud)
{
    $statusResposta = (boolean) false;

    $conexao = conexaoMysql();

    $sql = "insert into tblcrud
    (nome, 
     preco, 
     destaques, 
     foto, 
     descricao)
values 
    ('".$dadosCrud ['nome']."', 
     '".$dadosCrud ['preco']."', 
     '".$dadosCrud ['destaques']."', 
     '".$dadosCrud ['foto']."', 
     '".$dadosCrud ['descricao']."'
);";

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

function updateCrud($dadosCrud)
{
    //declaração de variavel para utilizar no return desta função
    $statusResposta = (boolean) false;

    //Abre aconexão com o BD
    $conexao = conexaoMysql();

    //Monta o script para enviar para o BD
    $sql = "update tblcrud set 
                    nome        = '".$dadosCrud['nome']."', 
                    preco       = '".$dadosCrud['telefone']."', 
                    destaques   = '".$dadosCrud['celular']."', 
                    foto        = '".$dadosCrud['email']."', 
                    descricao   = '".$dadosCrud['obs']."',
            where id =".$dadosCrud['id'];

   
    //Executa o scriipt no BD
        //Validação para veririficar se o script sql esta correto
    if (mysqli_query($conexao, $sql))
    {   
        //Validação para verificar se uma linha foi acrescentada no DB
        if(mysqli_affected_rows($conexao))
            $statusResposta = true;
    }
    
    //Solicita o fechamento da conexão com o BD
    fecharConexaoMysql($conexao);

    return $statusResposta;

}

function deleteCrud($id)
{
    //declaracao de variavel para utilizar no return desta função
    $statusResposta = (boolean) false;

    //abre a conexão com o BD
    $conexao = conexaoMysql();

    //script para deletar um registro no BD
    $sql = "delete from tblcrud where id=".$id;

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

function selectAllCrud()
{
    //Abre a conexão com o BD
    $conexao = conexaoMysql();

    //script para listar todos os dados do BD
    $sql = "select * from tblcrud order by id desc";
    
    //Executa o scrip sql no BD e guarda o retorno dos dados, se houver
    $result = mysqli_query($conexao, $sql);

    //Valida se o BD retornou registros
    if($result)
    {
        //mysqli_fetch_assoc() - permite converter os dados do BD 
        //em um array para manipulação no PHP
        //Nesta repetição estamos, convertendo os dados do BD em um array ($rsDados), além de
        //o próprio while conseguir gerenciar a qtde de vezes que deverá ser feita a repetição
        $cont = 0;
        while ($rsDados = mysqli_fetch_assoc($result))
        {
            //Cria um array com os dados do BD
            $arrayDados[$cont] = array (
                "id"        =>  $rsDados['id'],
                "nome"      =>  $rsDados['nome'],
                "preco"     =>  $rsDados['preco'],
                "destaques" =>  $rsDados['destaques'],
                "foto"      =>  $rsDados['foto'],
                "descricao" =>  $rsDados['descricao']
            );
            $cont++;
        }

        //Solicta o fechamento da conexão com o BD
        fecharConexaoMysql($conexao);

        
        //select id from tblproduto order by id desc limit 1
        if(isset($arrayDados))
            return $arrayDados;
        else
            return false;
    }

}
?>