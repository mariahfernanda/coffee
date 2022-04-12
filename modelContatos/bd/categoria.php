<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <div class="menu"> <img src="../img/cart-add-regular-24.png" width="30px" height="30px"> </div>
                <div class="menu">  <a href="">Adm. Produtos</a>       </div>

                <div class="menu"> <img src="./img/categoria.png" width="25px" height="25px"> </div>
                <div class="menu">  <a href="">Adm. de Categoria</a>   </div>

                <div class="menu"> <img src="./img/telefone.png" width="25px" height="25px"> </div>
                <div class="menu">  <a href="../indexContato.php">Contatos</a>            </div>

                <div class="menu"> <img src="./img/usuario.png" width="25px" height="25px"> </div>
                <div class="menu">  <a href="">Usuários</a>            </div>

                <h3>Bem Vindo</h3>
                <h3>Logout</h3>
                </div>

        </nav>
            
        <nav class="sessao">
            <h1>SESSÃO</h1>
        </nav>
    </main>

    <div id="categoria">
        <div id="cadastrarCategoria">
            <h1>Cadastrar Categoria</h1>
        </div>

        <div id="cadastroInformacoes">
            <form action="router.php?component=categorias&action=inserir" name="frmCategoria" method="post">
                <div class="campos">
                    <div class="cadastroInformacoesCategorias">
                        <label>Tipo: </label>
                    </div>
                    <div class="cadastroEntradadaCategorias">
                        <input type="text" name="txtTipo" value="" placeholder="Digite o tipo da Categoria" maxlength="100">
                    </div>
                </div>

                <div class="campos">
                    <div class="cadastroInformacoesCategorias">
                        <label>Fabricante: </label>
                    </div>
                    <div class="cadastroEntradadaCategorias">
                        <input type="text" name="txtFabricante" value="" placeholder="Digite o tipo da Categoria" maxlength="100">
                    </div>
                </div>
            </form>
        </div>
    </div>






    <footer>
        <footer>Copyright 2022 © | Maria Fernanda</footer>
    </footer>
</body>
</html>