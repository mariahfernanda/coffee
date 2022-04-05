<?php
/*************
 * Criar conexão com o BD mysql
 * 05/04/2022
 *************/

 const SERVER = 'localhost';
 const USER = 'root';
 const PASSWORD = 'BCD127';
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