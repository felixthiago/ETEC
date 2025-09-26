<?php
require 'Produto.class.php';
$p = new Produto();
$dadosProduto = $p->buscarProdutos();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/produto.css">
    <title>Produtos</title>
</head>
<body>
    <section>
        <h1>Todos os Produtos</h1>
        <div class="container-produtos">
            <?php
            if (empty($dadosProduto)) {
                echo "Ainda não há produtos cadastrados aqui!";
            } else {
                foreach ($dadosProduto as $value) {
            ?>
                    <a href="exibir_produto.php?id=<?php echo $value['id_produto']; ?>">
                        <div class="produto-item">
                            <img src="imagens/<?php echo $value['foto_capa']; ?>" class="img-produto">
                            <div class="nome-produto"><?php echo $value['nome_produto']; ?></div>
                        </div>
                    </a>
            <?php
                }
            }
            ?>
        </div>
        <a href="index.php" class="btn-voltar">Cadastrar Novo Produto</a>
    </section>
</body>
</html>