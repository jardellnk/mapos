<?php if(isset($row_emitente)): ?><?php endif; ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> Ma-OStore -<?= $this->config->item('app_name') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('/assets/home/css/fontawesome.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/home/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/home/css/home.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/home/css/responsivo.css'); ?>">
</head>
<body>
    <div class="container-mensagens" id="container-mensagens"></div>
    <a class="botao-carrinho animated bounceIn hidden" onclick="cardapio.metodos.abrirCarrinho(true)">
        <div class="badge-total-carrinho">0</div>
        <i class="fa fa-shopping-bag"></i>
    </a>
    <section class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg pl-0 pr-0 col-one">
            <a class="navbar-brand wow fadeIn" href="<?php echo base_url('index.php/home'); ?>">
                 <img src="<?php echo $row_emitente['url_logo'] ?>" width="160" class="img-logo" alt="Logo da Empresa">
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto mr-auto wow fadeIn">
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/mine'); ?>" class="nav-link"><b>Área do Cliente</b></a>
                        </li>
                       <li class="nav-item">
                            <a href="<?php echo base_url('index.php/mapos'); ?>" class="nav-link"><b>Área Admin</b></a>
                        </li> 
                        <li class="nav-item">
                            <a href="<?php echo base_url('home/consulta'); ?>" class="nav-link"><b>Consulta de equipamentos</b></a>
                      
                    </ul>
                    
                    <a class="btn btn-white btn-icon wow fadeIn" data-toggle="modal" data-target="#modalPesquisa">
    Pesquisa <span class="icon">
        <div class="container-total-carrinho badge-total-carrinho hidden">0</div>
        <i class="fa fa-search"></i> <!-- Ícone de lupa -->
    </span>
</a>


                   
                    <!-- <a class="btn btn-white btn-icon wow fadeIn" onclick="cardapio.metodos.abrirCarrinho(true)">
                        Meu carrinho <span class="icon">
                            <div class="container-total-carrinho badge-total-carrinho hidden">0</div>
                            <i class="fa fa-shopping-bag"></i>
                        </span>
                    </a> -->
                </div>
            </nav>
        </div>
    </section>
    <div class="modal fade" id="modalPesquisa" tabindex="-1" role="dialog" aria-labelledby="modalPesquisaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('home/pesquisa'); ?>" method="GET">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Pesquisar produtos">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i> <!-- Ícone de lupa -->
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Adicionando o kit de ícones FontAwesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
