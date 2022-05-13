<?php
const SERVER = 'localhost';
const USER = 'root';
const PASSWORD = 'bcd127';
const DATABASE = 'db_inout_coffee';

$resultado = conexaoMysql();

 //abre a conexão com o BD Mysql
 function conexaoMysql()
 {
     $conexao = array();

    //se a conexão for estabelecida com o BD, iremos ter um array de dados sobre a conexão
    $conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    //validaçao para verificar se a conexão foi realizada com sucesso
    if($conexao)
        return $conexao;
    else
        return false;
 }

//fechar conex~so com o BD Mysql
 function fecharConexaoMysql($conexao)
 {
    mysqli_close($conexao);
 }

/*
    Existem 3 formas de criar a conexão com o BD Mysql
    
        mysql_connect() - versão antiga de PHP de fazer a conxão com BD
            (Não oferece performance e segurança)

        mysqli_connect() - versão mais atualizada do PHP de fazer a conexão com BD
            (ela permite ser utilizada para programação estruturada e POO)

        PDO() - versão mais completa e eficiente para conexão com BD
            (é indicada pela segurança e POO )

 */


?>