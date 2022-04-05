<?php
/*************************************************************** 
    * Objetivo: Arquivo responsável pela manipular od dados dentro do BD
    *  (insert, update, select e delete)
    * 05/04/2022
    * Versão: 1.0
***************************************************************/
    require_once('conexaoMysql.php');

    function adicionarContatos($dadosContatos)
    {
        $statusResposta = (boolean) false;

        $conexao = conexaoMysql();

        $sql = "insert into tblcontatos
                    (nome,
                    telefone,
                    celular,
                    email)
        
                values
                    ('".$dadosContatos['nome']."',
                     '".$dadosContatos['telefone']."',
                     '".$dadosContatos['celular']."',
                     '".$dadosContatos['email']."');";

    
        if(mysqli_query($conexao, $sql))
            {
                if(mysqli_affected_rows($conexao))
                $statusResposta = true;

                else
                $statusResposta = false;
            }
        else
        {
            $statusResposta = false;
        }

        fecharConexaoMysql($conexao);
        return $statusResposta;
    }



?>