<div class="container">
    <h1>Produtos no Carrinho</h1>
    <div class="row">
        <?php if (!empty($produtos_no_carrinho)) : ?>
            <?php foreach ($produtos_no_carrinho as $produto) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="<?= base_url($produto['imagem']); ?>" alt="<?= $produto['descricao']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produto['descricao']; ?></h5>
                            <p class="card-text">Preço: R$ <?= number_format($produto['preco'], 2); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-md-12">
                <p>Nenhum produto no carrinho.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
