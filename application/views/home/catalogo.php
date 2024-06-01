<?php
// Adicione esta linha para definir a variável $pagina_atual
$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_VALIDATE_INT) ? intval($_GET['pagina']) : 1;
?>
<section>
    <div class="container">
        <h1 class="title text-center mb-5 wow fadeIn">Conheça alguns de nossos produtos</h1>
        <div class="row justify-content-center">
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="col-sm-4 col-md-3 mb-4">
                        <?php
                        $img_src = empty($produto['img']) || !file_exists('./' . $produto['img']) ? 'assets/img/produtos/produtos.jpeg' : '/' . $produto['img'];
                        ?>
                        <div class="card text-center h-100">
                            <a href="<?= site_url('home/detalhes/'.$produto['idProdutos']); ?>">
                                <img src="<?= base_url($img_src); ?>" alt="Imagem do Produto" class="card-img-top mx-auto d-block" style="height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title"><?= $produto['descricao']; ?></h4>
                            </div>
                            <!-- Moving the add-to-cart button outside of the card-body -->
                            <div class="card-footer">
                                <a href="#" class="btn btn-white btn-icon-left btnLigar d-inline-flex align-items-center add-to-cart" data-product-id="<?= $produto['idProdutos']; ?>">
                                    <span class="icon-left">
                                        <i class="fa fa-shopping-cart"></i> <!-- Fixing the cart icon -->
                                    </span>
                                    <span class="ml-2">Add ao carrinho</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Nenhum produto disponível.</p>
                </div>
            <?php endif; ?>
        </div>
        <?php if (isset($total_paginas) && $total_paginas > 1): ?>
            <div class="row text-center wow fadeInUp">
                <div class="col-12">
                    <ul class="pagination">
                        <?php if ($pagina_atual > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?= $pagina_atual - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                            <li class="page-item <?= ($pagina_atual == $i) ? 'active' : ''; ?>">
                                <a class="page-link" href="?pagina=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <?php if ($pagina_atual < $total_paginas): ?>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?= $pagina_atual + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
