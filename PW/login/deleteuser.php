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
                <span>Deletar usuario</span>
                <form id="form-login" method="post" action="teste.php">
                    <!-- adicionando campos do formulário-->
                    <input type="number" name="id" placeholder = "id" minlength = "1" maxlength = "5" required>
                    <input type="submit"  name = "btnDelete" value="Deletar">
                </form>
            </div>
        </div>
    </body>
</html>
