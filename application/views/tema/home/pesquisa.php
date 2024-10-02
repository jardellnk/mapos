<?php

// Define the variable $pagina_atual based on the 'pagina' parameter from the URL
$pagina_atual = $this->input->get('pagina') ?? 1;
?>

<body>
    <div class="container">
        <p class="title text-center mb-5 wow fadeIn">"Selecionamos produtos ideais para você."</p>

        <div class="row justify-content-center">
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="col-sm-4 col-md-3 mb-4">
                        <?php
                        $img_src = empty($produto['img']) || !file_exists('./' . $produto['img']) ? './assets/img/produtos/produtos.jpeg' : './' . $produto['img'];
                        ?>
                        <div class="card text-center h-100">
                            <a href="<?= site_url('home/detalhes/'.$produto['idProdutos']); ?>">
                                <img src="<?= base_url($img_src); ?>" alt="Imagem do Produto" class="card-img-top mx-auto d-block" style="height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title"><?= $produto['descricao']; ?></h4>
                            </div>
                            <!-- Adding the add-to-cart button outside of the card-body -->
                            <div class="card-footer text-center">
    <a href="<?= site_url('home/detalhes/'.$produto['idProdutos']); ?>" class="btn btn-white btn-icon-left btnLigar d-inline-flex align-items-center add-to-cart" data-product-id="<?= $produto['idProdutos']; ?>">
        <span class="icon-left">
            <i class="fa fa-cogs"></i> <!-- Corrigindo o ícone do carrinho -->
        </span>
        <span class="ml-1">Detalhes</span>
    </a>
</div>

                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (isset($total_paginas) && $total_paginas > 1): ?>
                    <div class="col-12 text-center mt-4">
                        <ul class="pagination">
                            <?= $this->pagination->create_links(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Nenhum resultado encontrado para sua pesquisa.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>