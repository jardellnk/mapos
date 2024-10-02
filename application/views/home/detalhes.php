<div class="container">
    <?php if (!empty($produto)) : ?>
        <div class="row">
            <!-- Coluna para a Imagem -->
            <div class="col-lg-4">
                <div class="card mt-4">
                    <?php if (!empty($produto['img']) && file_exists('./' . $produto['img'])) : ?>
                        <img src="<?= base_url($produto['img']); ?>" alt="Imagem do Produto" class="card-img-top mx-auto d-block" style="max-height: 300px;">
                    <?php else : ?>
                        <img src="<?= base_url('assets/img/produtos/produtos.jpeg'); ?>" alt="Imagem do Produto" class="card-img-top mx-auto d-block" style="max-height: 300px;">
                    <?php endif; ?>
                    <div class="card-body text-center">
                        <p class="card-text"><?php echo $produto['descricao']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Coluna para os Detalhes do Produto -->
            <div class="col-lg-8">
                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Detalhes do Produto
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $produto['especificacao']; ?></p>
                        <hr>
                        <p class="card-text">
                            <?php if (!empty($produto['link'])) : ?>
                                <a href="<?php echo $produto['link']; ?>">Acesse o site do Fabricante</a>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-warning mt-4" role="alert">
            O produto não pôde ser encontrado.
        </div>
    <?php endif; ?>
</div>
<br><br><br><br><br><br><br><br><br>
