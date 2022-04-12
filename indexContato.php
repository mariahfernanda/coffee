<?php
//Valida se a utilização de variáveis de 
//sessão esta aiva no servidor
    if(session_status())
    {
        //valida se a variável de sessão dadosContato
        //não está vázia
        if(!empty($_SESSION['dadosContato']))
        {
            $id        = $_SESSION['dadosContato']['nome'];
            $nome      = $_SESSION['dadosContato']['nome'];
            $telefone  = $_SESSION['dadosContato']['telefone'];
            $celular   = $_SESSION['dadosContato']['celular'];
            $email     = $_SESSION['dadosContato']['email'];
            $obs       = $_SESSION['dadosContato']['obs'];
        }
    }
        

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cssContato/style.css">
    <link rel="stylesheet" href="./cssContato/styleHeader.css">
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

        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Contatos</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Celular </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Excluir </td>
                </tr>
                
               <?php
               //import do arquivo da controller para solicitar a listage, gos dados
                    require_once('controller/controllerContatos.php');
                    //chama a função que vai retornar od dados de contatos
                    $listContato = listarContato();
                    
                    //estrutura de repetição para retornsar os dados do array
                    //e printar na tela
                    foreach($listContato as $item)
                    {
               ?>
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$item['nome']?></td>
                        <td class="tblColunas registros"><?=$item['celular']?></td>
                        <td class="tblColunas registros"><?=$item['email']?></td>
                    
                        <td class="tblColunas registros">

                                <a onclick="return confirm('Deseja realmente excluir esse item?');" href="router.php?component=contatos&action=deletar&id=<?=$item['id']?>">
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