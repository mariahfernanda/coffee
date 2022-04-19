<?php

$action = (string) null;
$component = (string) null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET')
{
    $component = strtoupper($_GET['component']);
    $action    = strtoupper($_GET['action']);

    switch($component)
    {
        case 'CONTATOS':
            require_once('controller/controllerContatos.php');

            if($action == 'INSERIR')
            {
                $resposta = inserirContato($_POST);

                if(is_bool($resposta))
                {
                    if($resposta)
                    echo("<script>
                            alert('Registro Inserido com sucesso!');
                            window.location.href = 'indexContato.php';
                        </script>");

                }elseif (is_array($resposta))
                            echo("<script>
                                    alert('".$resposta['message']."');
                                    window.history.back();
                                </script> ");
            }elseif($action == 'DELETAR')
            {
                $idContato = $_GET['id'];

                $resposta = excluirContato($idContato);

                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                alert('Registro Excluído com sucesso!');
                                window.location.href = 'indexContato.php';
                            </script>");
                    }
                }elseif(is_array($resposta))
                {
                    echo("<script>
                            alert('".$resposta['message']."');
                                window.history.back();
                        </script> ");
                
                }
            }
    }
}

$action = (string) null;
$component = (string) null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET')
{
    $component = strtoupper($_GET['component']);
    $action    = strtoupper($_GET['action']);

    switch($component)
    {
        case 'CATEGORIA':
            require_once('controller/controllerCategorias.php');

            if($action == 'INSERIR')
            {
                $resposta = inserirCategoria($_POST);

                if(is_bool($resposta))
                {
                    if($resposta)
                    echo("<script>
                            alert('Registro Inserido com sucesso!');
                            window.location.href = 'indexCategoria.php';
                        </script>");

                }elseif (is_array($resposta))
                            echo("<script>
                                    alert('".$resposta['message']."');
                                    window.history.back();
                                </script> ");
            }elseif($action == 'DELETAR')
            {
                $idCategoria = $_GET['id'];

                $resposta = excluirCategoria($idCategoria);

                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                alert('Registro Excluído com sucesso!');
                                window.location.href = 'indexCategoria.php';
                            </script>");
                    }
                }elseif(is_array($resposta))
                {
                    echo("<script>
                            alert('".$resposta['message']."');
                                window.history.back();
                        </script> ");
                
                }
            }
    }
}


?>