

<div class="accordion" id="collapse-group">
    <div class="accordion-group widget-box">
        <div class="accordion-heading">
            <div class="widget-title" style="margin: -20px 0 0">
                
                    <span class="icon"><i class="fas fa-shopping-bag"></i></span>
                    <h5><?php echo $result->descricao ?></h5>
                </a>
            </div>
        </div>
        
            <div class="widget-content">
            <div class="span3" style="padding: 1%; margin-left: 0">  <style>
	
	</style>
                        <img src=<?php echo base_url() .  $result->img ?> alt="Imagem Ilustrativa"  height="300" width="300" >
            </div>
                
                        <div class="span9" style="padding: 1%; margin-left: 0">
                        <table class="table table-bordered">
                            <tbody>  
                                <tr>
                                    <td style="text-align: right; width: 20%"><strong>Código de Barra</strong></td>
                                    <td>
                                        <?php echo $result->codDeBarra ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align: right; width: 20%"><strong>Descrição</strong></td>
                                    <td>
                                       <?php echo $result->descricao ?> 
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align: right; width: 20%"><strong>Especificação</strong></td>
                                    <td>
                                    <?php echo $result->especificacao ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; width: 20%"><strong>Categoria</strong></td>
                                    <td>
                                        <?php echo $result->categoria ?>
                                    </td>
                                </tr>

                                
                                <tr>
                                    <td style="text-align: right; width: 20%"><strong>Link (Fabricante)</strong></td>
                                    <td>
                                        <a href=" <?php echo $result->link ?> ">Acessar Site do fabricante </a>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="text-align: right; width: 20%"><strong>Localização em estoque</strong></td>
                                    <td>
                                        <?php echo $result->localizacao ?>
                                </td>
                                <tr>
                                    <td style="text-align: right; width: 20%"><strong>Fornecedor</strong></td>
                                    <td>
                                        <?php echo $result->fornecedor ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; width: 20%"><strong>Obs</strong></td>
                                    <td>
                                        <?php echo $result->obs ?>
                                    </td>
                                </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>