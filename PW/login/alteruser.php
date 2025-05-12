<html lang="pt-br">
    <head>
        <!--Serve par setar o UNICODE do site para o usado em PT-BR-->
        <meta charset="UTF-8"/> 
        <title>Tela de Login</title>
        <title>Seja bem-vindo</title>
        
        <!--vinculando a tela, com o CSS para estilizar a página-->
        <link rel="stylesheet" type="text/css" href="./css/index.css">

        <!--vinculando tela com o script que vamos criar as funcionalidades-->
        <script src="./js/index.js"></script>

        <!-- Para usar o  SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>
    <body>
        <!--Essa div, representa onde todo o conteúdo do site vai ficar-->
        <div class="container-principal">
            <!-- aqui é o espaço onde vamos criar o formulário-->
            <div class="formulario" >
                <span>Alterar nome do usuario</span>
                <form id="form-login" method="post" action="teste.php">
                    <input type="text" name="email" id="email" placeholder = "Digite o email" minlength = "3" maxlength = "50">
                    <input type="text" placeholder="Digite o novo nome:" name="novoNome" required="true" minlength="3" maxlength="15">

                    <input type="submit"  name = "btnModify" value="Alterar nome">
                </form>
            </div>
        </div>
    </body>
</html>
