<?php

function inserirContato ($dadosContato)
{
    if(!empty($dadosContato))
    {
        if(!empty($dadosContato['txtNome'] && !empty($dadosContato['txtCelular']) && !empty($dadosContato['txtEmail'])))
        {
            $arrayDados = array(
                "nome"      => $dadosContato['txtNome'],
                "telefone"  => $dadosContato['txtTelefone'],
                "celular"   => $dadosContato['txtCelular'],
                "email"     => $dadosContato['txtEmail'],
            );

            require_once('modelContatos/bd/contato.php');

            if(insertContato($arrayDados))
                return true;
            else
                return array ('idErro' => 1,
                              'message' => 'Não foi possivel inserir os dados no Banco de Dados');                     
        }
        else
            return array ('idErro' => 2,
                          'message'=> 'Existem campos obrigatório que não foram preechidos');
    }
}

function excluirContato($id)
{
    if($id != 0 &&  !empty($id) && is_numeric($id))
        {
            require_once('modelContatos/bd/contato.php');

            if(deleteContato($id))
                return true;
            else
                return array('idErro'   => 3,
                             'message'  => 'o banco de dados não pode excluír o registro.'
                            );

        }else
        return array('idErro'   => 3,
                     'message'  => 'Não é possível excluír o registro sem informar um id válido.'
                    );
}

function listarContato()
{
    require_once('modelContatos/bd/contato.php');

    $dados = selectAllContatos();

    if(!empty($dados))
         return $dados;
    else
        return false;
}


?>