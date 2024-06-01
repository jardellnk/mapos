<div class="container">
    <div class="row">
        <!-- Coluna para a Imagem -->
        <div class="col-lg-4">
            <div class="card mt-4">
                <?php if (!empty($produto['img']) && file_exists('./' . $produto['img'])) : ?>
                    <img src="<?= base_url($produto['img']); ?>" alt="Imagem do Produto" class="card-img-top mx-auto d-block" style="height: 200px;">
                <?php else : ?>
                    <img src="<?= base_url('assets/img/produtos/produtos.jpeg'); ?>" alt="Imagem do Produto" class="card-img-top mx-auto d-block" style="height: 200px;">
                <?php endif; ?>
                <div class="card-body">
                    <p class="card-item:hover"><?php echo $produto['descricao']; ?></p>
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
                    <br>
                    <p class="estoque"> Estoque atual: <?php echo $produto['estoque']; ?></p>

                    <a href="cart.php?add_to_cart=<?php echo $produto['idProdutos']; ?>" class="btn btn-white btn-icon-left mt-3" id="btnLigar">
                        <span class="icon-left">
                            <i class="fa fa-shopping-bag"></i>
                        </span>Adicionar ao Carrinho          
                    </a>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br><br><br>
