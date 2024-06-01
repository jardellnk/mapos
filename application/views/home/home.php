<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="cardapio" id="cardapio">
    <div class="container">
        <h1 class="title text-center mb-5 wow fadeIn">Conheça alguns de nossos produtos</h1>
        <div class="row justify-content-center mb-10 wow fadeIn">
            <?php foreach ($produtos as $produto) : ?>
                <div class="col-sm-4 col-md-3 mb-4">
                    <?php
                    $img_src = empty($produto['img']) || !file_exists('./' . $produto['img']) ? './assets/img/produtos/produtos.jpeg' : './' . $produto['img'];
                    ?>
                    <div class="card text-center h-100">
                        <a href="<?= site_url('home/detalhes/'.$produto['idProdutos']); ?>">
                            <img src="<?= base_url($img_src); ?>" alt="Imagem do Produto" class="card-img-top mx-auto d-block" style="height: 200px;">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <?= $produto['descricao']; ?>
                            </h4>
                        </div>
                        <!-- Adicionando o botão de adicionar ao carrinho fora da card-body -->
                        <div class="card-footer">
                            <a href="#" class="btn btn-white btn-icon-left btnLigar d-inline-flex align-items-center add-to-cart" data-product-id="<?= $produto['idProdutos']; ?>">
                                <span class="icon-left">
                                    <i class="fa fa-shopping-cart"></i> <!-- Corrigindo o ícone do carrinho -->
                                </span>
                                <span class="ml-2">Add ao carrinho</span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row text-center wow fadeInUp">
            <div class="col-12">
                <a id="btnVerMais" class="btn btn-white btn-sm" href="<?= site_url('home/produtos?pagina=1'); ?>">Ver mais produtos</a>
            </div>
        </div>
    </div>
</section>
