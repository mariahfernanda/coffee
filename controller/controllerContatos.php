<?php

function inserirContato ($dadosContato)
{

    if(!empty($dadosContato))
    {
        if(!empty($dadoscontato['txtNome'])&& !empty($dadoscontato['txtCelular']) &&!empty ($dadoscontato['txtEmail']))
        {
            $arrayDados = array(
                "nome"      => $dadosContato['txtNome'],
                "telefone"  => $dadosContato['txtTelefone'],
                "celular"   => $dadosContato['txtCelular'],
                "email"     => $dadosContato['txtEmail'],
            );

            require_once('model/bd/contato.php');

            if(insertContato($arrayDados))
                return true;
            else
            return array('idErro' =>1,
                         'message' => 'Não foi possivel inserir os dados no Banco de Dados');

        }
            else
                return array('idErro' => 2, 'message'=> 'Existem compos origatório que não foram preechidos'); 
    }

        
}

?>