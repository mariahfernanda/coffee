<?php

    if(session_status())
    {

        if(!empty($_SESSION['dadosCategoria']))
        {
            $id        = $_SESSION['dadosCategoria']['nome'];
            $nome      = $_SESSION['dadosCategoria']['nome'];
        }
    }
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cssCategoria/style.css">
    <link rel="stylesheet" href="./cssCategoria/styleHeader.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="titulo-site">
            <h1>CMS InOut Coffee</h1>
            <h4>Gerenciamento de Conteúdo do Site</h4>
        </nav>
        <img src="./img/logoCoffee.png" alt="">
    </header>

    <main>
        <nav class="selecao">
            <div class="itens">
                <div class="menu"> <img src="../coffee/cms/img/cart-add-regular-24.png" width="30px" height="30px"> </div>
                <div class="menu">  <a href="">Adm. Produtos</a>       </div>

                <div class="menu"> <img src="../coffee/cms/img/categoria.png" width="25px" height="25px"> </div>
                <div class="menu">  <a href="">Adm. de Categoria</a>   </div>

                <div class="menu"> <img src="../coffee/cms/img/telefone.png" width="25px" height="25px"> </div>
                <div class="menu">  <a href="../indexContato.php">Contatos</a>            </div>

                <div class="menu"> <img src="../coffee/cms/img/usuario.png" width="25px" height="25px"> </div>
                <div class="menu">  <a href="">Usuários</a>            </div>

                <h3>Bem Vindo</h3>
                <h3>Logout</h3>
            </div>
        </nav>
        
        <nav class="sessao">
            <h1>SESSÃO</h1>
        </nav>
    </main>
    
    <div id="consultaCategoria">
        <table id="tblConsulta">
            <tr>
                <td id="tblTitulo" colspan="6">
                    <h1> Categorias </h1>
                </td>
            </tr>
            <tr id="tblLinhasCategoria">
                <td class="tblColunas destaque"> Nome da Categoria </td>
                <td class="tblColunas destaque"> Excluir </td>
                <td class="tblColunas destaque"> Editar </td>
            </tr>

            <?php

                require_once('controller/controllerCategorias.php');

                $listCategoria = listarCategoria();

                foreach($listCategoria as $item)
                {
            ?>

                <tr id="tblLinhasCategoria">
                    <td class="tblColunas "><?=$item['nome']?></td>
                
                    <td class="tblColunas ">

                        <a onclick="return confirm('Deseja realmente excluir esse item?');" href="router.php?component=categoria&action=deletar&id=<?=$item['id']?>">
                            <img src="img/excluir.png" alt="Excluir" title="Excluir" class="excluir">

                    </td>
                </tr>
            <?php
                }
            ?>

        </table>
    </div>


    
    <footer>
        <footer>Copyright 2022 © | Maria Fernanda</footer>
    </footer>
</body>
</html>