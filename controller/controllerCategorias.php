<?php

function inserirCategoria($dadosCategoria)
{
    if(!empty($dadosCategoria))
    {
        if(!empty($dadosCategoria['txtNomeCategoria']))
        {
            $arrayDados          = array(
                "nomecategoria"  => $dadosCategoria['txtNomeCategoria'],
            );

            require_once('modelContatos/bd/categoria.php');

            if(insertCategoria($arrayDados))
                return true;
            else
                return array ('idErro' =>1,
                              'message' => 'Não foi possivel inserir dados');
        }
        else
            return array ('idErro' => 2,
                          'message' => ' Essa categoria já existe');
    }
}

function excluirCategoria($id)
{
    if($id !=0 && !empty($id) && is_numeric($id))
    {
        require_once('modelContatos/bd/categoria.php');

        if(deleteCategoria($id))
            return true;
        else
            return array('idErro'  => 3,
                         'message' => 'o banco de dados não pode excluir o registro.');                        
    }else
    return array('idErro'  => 3,
    'message' => 'o banco de dados não pode excluir o registro.');
}

function listarCategoria()
{
    require_once('modelContatos/bd/categoria.php');

    $dados = selectAllCategoria();

    if(!empty($dados))
        return $dados;
    else
        return false;
}

?>