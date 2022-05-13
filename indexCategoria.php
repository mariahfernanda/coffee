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
    <link rel="stylesheet" href="./cssCategoria/categoria.css">
    <title>Categoria</title>
</head>
<body>
    <header>
        <nav class="titulo-site">
            <h1>CMS InOut Coffee</h1>
            <h4>Gerenciamento de Conteúdo do Site</h4>
        </nav>
        <img src="./img/logoCoffee.png" alt="">
    </header>

    <div class="sidebar">

<div class="logo_content">                
    <div class="logo">
        <h3 class="logo-name">
            grãos de café
        </h3>
    </div>
    <div class="btn-toggle">
        <i class='bx bx-menu'></i>
        <span></span>
    </div>
</div>

    <ul class="nav">
        <li>
            <a href="../paginas/produtos.php">
            <i class='bx bx-list-ul'></i>
            <span>adm. produtos</span>
            </a>
        </li>

        <li>
            <a href="../paginas/categorias.php">
            <i class='bx bx-category' ></i>
            <span>adm. de categorias</span>
            </a>
        </li>

        <li>
            <a href="../cms/contatos.php">
            <i class='bx bxs-contact' ></i>
            <span>contatos</span>
            </a>
        </li>

        <li>
            <a href="../paginas/usuarios.php">
            <i class='bx bx-user-pin' ></i>
            <span>usuarios</span>
            </a>
        </li>

        <li>
            <a href="../cms/login.php">
            <i class='bx bx-log-out' ></i>
            <span>log-out</span>
            </a>
        </li>
    </ul>
</div>
        
        <nav class="sessao">
            <h1>Categoria</h1>
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

                if(listarCategoria()){
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
            }
            ?>

        </table>
    </div>


    
    <footer>
        <footer>Copyright 2022 © | Maria Fernanda</footer>
    </footer>
</body>
</html>