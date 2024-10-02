<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 col-sm-12 col-one">
                <div class="d-flex text-banner">
                    <h1 class="wow fadeInLeft"><b>Transformando Bits em <b class="color-primary">inovação.</b></b></h1>
                    <p class="wow fadeInLeft delay-02s">                   
                    Desempenho que Surpreende!
                    </p>
                    <div class="wow fadeIn delay-05s">
                        <a href="#cardapio" class="btn btn-yellow mt-4 mr-3">
                            Ver produtos
                        </a>
                        <a href="tel:<?php echo $row_emitente['telefone'] ?>" class="btn btn-white btn-icon-left mt-4" id="btnLigar">
                            <span class="icon-left">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php echo $row_emitente['telefone'] ?>
                        </a>
                    </div>
                </div>
                <a href="https://<?php echo $row_emitente['instagram'] ?>" target="_blank" class="btn btn-sm btn-white btn-social mt-4 mr-3 wow fadeIn delay-05s">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://<?php echo $row_emitente['facebook'] ?>" class="btn btn-sm btn-white btn-social mt-4 mr-3 wow fadeIn delay-05s">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://api.whatsapp.com/send/?phone=55<?php echo $row_emitente['whatsapp'] ?>&text=Olá! Gostaria de conversar " class="btn btn-sm btn-white btn-social mt-4 wow fadeIn delay-05s">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>

            <div class="col-6 no-mobile">
                <div class="card-banner wow fadeIn delay-02s"></div>
                <div class="d-flex img-banner wow fadeIn delay-05s">
                    <img src="<?php echo base_url('/assets/home/img/banner1.png'); ?>" />
                </div>
                <div class="card card-case wow fadeInRight delay-07s">
                "Desempenho impecável, entrega rápida e atendimento excepcional."
                    <span class="card-case-name">
                        <b>Thiago Lopes</b>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 

<?php
// Arrays contendo os caminhos dos banners, depoimentos e textos do banner
$banners = [
    "banner1.png",
    "banner2.png",
    "banner3.png",
    // Adicione quantos banners quiser aqui
];

$depoimentos = [
    "Além da agilidade o preço, o atendimento e a qualidade dos produtos também surpreendem.",
    "Estou muito satisfeito com os produtos e o serviço oferecido.",
    "Excelente empresa! Recomendo a todos.",
    // Adicione quantos depoimentos quiser aqui
];

$textosBannerG = [
    "Escolha sua batida <b class='color-primary'>favorita.</b>",
    "O maximo em <b class='color-primary'>desempenho.</b>",
    "Chega de <b class='color-primary'>loading.</b>",
    // Adicione quantos textos de banner quiser aqui
];

$textosBannerP = [
    "Escolha sua batida <b class='color-primary'>favorita.</b>",
    "Aproveite nossos produtos! Escolha o que desejar e receba em sua casa de forma rápida e segura.",
    // Adicione quantos textos de banner quiser aqui
];

// Seleciona aleatoriamente um banner, depoimento e texto do banner
$bannerSelecionado = $banners[array_rand($banners)];
$depoimentoSelecionado = $depoimentos[array_rand($depoimentos)];
$textoBannerSelecionado = $textosBannerG[array_rand($textosBannerG)];
$textoBannerSelecionadop = $textosBannerP[array_rand($textosBannerP)];
?>

<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 col-sm-12 col-one">
                <div class="d-flex text-banner">
                    <h1 class="wow fadeInLeft"><b><?php echo $textoBannerSelecionado; ?></b></h1>
                    <p class="wow fadeInLeft delay-02s">
                        <?php echo $depoimentoSelecionado; ?>
                    </p>
                    <div class="wow fadeIn delay-05s">
                        <a href="#" class="btn btn-yellow mt-4 mr-3">
                            Ver produtos
                        </a>
                        <a href="#" class="btn btn-white btn-icon-left mt-4" id="btnLigar">
                            <span class="icon-left">
                                <i class="fa fa-phone"></i>
                            </span>
                            (41) 99638-6999
                        </a>
                    </div>
                </div>
                <a href="https://www.instagram.com/" target="_blank" class="btn btn-sm btn-white btn-social mt-4 mr-3 wow fadeIn delay-05s">
                    <i class="fab fa-instagram"></i>
                </a>
                </a>
            </div>

            <div class="col-6 no-mobile">
                <div class="card-banner wow fadeIn delay-02s"></div>
                <div class="d-flex img-banner wow fadeIn delay-05s">
                     Mostra o banner selecionado 
                    <img src="<?php echo base_url('/assets/home/img/'.$bannerSelecionado); ?>" />
                </div>
                <div class="card card-case wow fadeInRight delay-07s">
                    <?php echo $depoimentoSelecionado; ?>
                    <span class="card-case-name">
                        <b>Nome do Cliente</b>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>              <a href="#" class="btn btn-sm btn-white btn-social mt-4 mr-3 wow fadeIn delay-05s">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="btn btn-sm btn-white btn-social mt-4 wow fadeIn delay-05s">
                    <i class="fab fa-whatsapp"></i>
  

 -->