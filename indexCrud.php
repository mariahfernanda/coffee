<?php
    //import do arquivo de configurações do projeto
    require_once('modulo/config.php');

    //Essa variavel foi criada para diferenciar no action do formulário
    //qual ação deveria ser levada para a router (inserir ou editar).
    //Nas condições abaixo, mudamos o action dessa variavel para a ação de
    //editar
    $form = (string) "router.php?component=crud&action=inserir";
    
    //Variavel para carregar o nome da foto do banco de dados
    $foto = (string) null;


    //Valida se a utilização de variáveis de 
    //sessão esta ativa no servidor
    if(session_status())
    {
        //Valida se a variável de sessão dadosContato 
        //não esta vázia
        if(!empty($_SESSION['dadosContato']))
        {
            $id         = $_SESSION['dadosContato']['id'];
            $nome       = $_SESSION['dadosContato']['nome'];
            $preco      = $_SESSION['dadosContato']['preco'];
            $destaques  = $_SESSION['dadosContato']['destaques'];
            $foto       = $_SESSION['dadosContato']['foto'];
            $descricao  = $_SESSION['dadosContato']['descricao'];

            //Mudamos a ação do form para editar o registro no click do botão salvar
            $form = "router.php?component=crud&action=editar&id=".$id."&foto=".$foto;

            //Destroi uma variavel da memória do servidor 
            unset($_SESSION['dadosContato']);
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cssCrud/style.css">
    <link rel="stylesheet" href="./cssCrud/styleCrude.css">
    <title>CRUD</title>
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
            <h1>CRUD</h1>
        </nav>
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Produtos </h1>
                
            </div>
            <div id="cadastroInformacoes">
                <!-- enctype="multipart/form-data" 
                    Essa opção é obrigatória para enviar arquivos
                    do formulário em html para o servidor. 
                -->
                <form  action="<?=$form?>" name="frmCadastro" method="post" enctype="multipart/form-data">
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome do Produto: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?= isset($nome)?$nome:null ?>" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                                     
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Preço: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTelefone" value="<?= isset($preco)?$preco:null?>">
                        </div>
                    </div>

                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Destques: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="checkbox" name="txtTelefone" value="<?= isset($destque)?$destaque:null?>">
                            <input type="checkbox" name="txtTelefone" value="<?= isset($destque)?$destaque:null?>">
                        </div>
                    </div>
    
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Escolha um arquivo: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="file" name="fleFoto" accept=".jpg, .png, .jpeg, .gif">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Descrição: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <textarea name="txtObs" cols="50" rows="7"><?= isset($descricao)?$descricao:null?></textarea>
                        </div>
                    </div>
                    <div class="campos">
                        <img src="<?=DIRETORIO_FILE_UPLOAD.$foto?>">
                    </div>

                    
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Dados.</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Celular </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Foto </td>
                    <td class="tblColunas destaque"> Foto </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
               <?php 
                    //import do arquivo da controller para solicitar a listagem dos dados
                    require_once('controller/controllerCrud.php');
                    //Chama a função que vai retornar os dados de contatos
                    if($listCrud = listarCrud())
                    {
                    //estrutura de repetição para retorar os dados do array 
                    //e printar na tela
                    foreach($listCrud as $item)
                    {
                        //Variavel para carregar a foto que veio do BD
                        $foto = $item['foto'];
                    ?>
                        <tr id="tblLinhas">
                            <td class="tblColunas registros"><?=$item['nome']?></td>
                            <td class="tblColunas registros"><?=$item['celular']?></td>
                            <td class="tblColunas registros"><?=$item['email']?></td>
                            <td class="tblColunas registros">
                                <img src="<?=DIRETORIO_FILE_UPLOAD.$foto?>" class="foto">
                            </td>
                        
                            <td class="tblColunas registros">
                                <a href="router.php?component=crud&action=buscar&id=<?=$item['id']?>">
                                    <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                                </a>

                                <a onclick="return confirm('Deseja realmente excluir este item?');" href = "router.php?component=crud&action=deletar&id=<?=$item['id']?>&foto=<?=$foto?>">
                                    <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                </a>
                                <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                            </td>
                        </tr>
                    
                    <?php 
                        }
                    }
                    ?>
            </table>
        </div>

    </main>
</body>
</html>