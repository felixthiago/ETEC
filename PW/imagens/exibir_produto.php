<?php
$dadosDoProduto = array();
$imagensDoProduto = array();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require 'Produto.class.php';
    $p = new Produto();
    $id = addslashes($_GET['id']);
    $dadosDoProduto = $p->buscarProduto($id);
    $imagensDoProduto = $p->buscarImagem($id);
} else {
    header("Location: produtos.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Produto</title>
    <link rel="stylesheet" href="css/exibir.css">
</head>
<body>
    <section>
        <?php if (!empty($dadosDoProduto)) : ?>
            <h1><?php echo $dadosDoProduto['nome_produto']; ?></h1>
            <p><span>Descrição:</span> <?php echo $dadosDoProduto['descricao']; ?></p>
            <hr>
            <div id="imagens">
                <?php foreach ($imagensDoProduto as $imagem) : ?>
                    <div class="caixa-img">
                        <img src="imagens/<?php echo $imagem['nome_imagem']; ?>" alt="Imagem do produto">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <h1>Produto não encontrado!</h1>
        <?php endif; ?>
        <a href="produtos.php" class="btn-voltar">Voltar para Produtos</a>
    </section>
</body>
</html>