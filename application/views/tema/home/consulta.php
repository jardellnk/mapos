<br><BR><section class="cardapio" id="cardapio">
    <div class="container">
        <h1 class="title text-center mb-5 wow fadeIn">Consulte a garantia de seu equipamento</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <form action="<?= base_url('home/consulta') ?>" method="post" id="consultaForm">
                    <!-- Adicionando token CSRF -->
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <div class="input-group">
                        <input type="text" class="form-control" name="serial" id="serial" placeholder="Inserir Nº de Série" pattern="\d{7,}" title="O número de série deve ter pelo menos 8 dígitos" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-white btn-sm">
                                <span class="icon-left">
                                    <i class="fa fa-search"></i>
                                </span>
                                <span class="ml-2">Buscar</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Informações da OS -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <?php if(isset($os)): ?>
                    <div>
                        <h2>Informações da OS</h2>
                        <?php if(!empty($os)): ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nº de Série</th>
                                       
                                        <th scope="col">Prazo Final da Garantia</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($os as $row): ?>
                                        <tr>
                                            <td><?= isset($_POST['serial']) ? $_POST['serial'] : '' ?></td>
                                            <?php if(isset($row['status'])): ?>
                                               
                                                <td>
                                                    <?php
                                                    $status = $row['status'];
                                                    if ($status === 'Faturado') {
                                                        $garantiaDias = intval($row['garantia']); // Convertendo para inteiro, caso necessário
                                                        $dataFinal = new DateTime($row['dataFinal']);
                                                        $dataFinal->modify('+' . $garantiaDias . ' days');
                                                        $hoje = new DateTime();
                                                        $dentroDoPrazo = $hoje < $dataFinal;
                                                        if ($dentroDoPrazo) {
                                                            $novaDataFinal = $dataFinal->format('d/m/Y');
                                                            echo $novaDataFinal;
                                                        } else {
                                                            echo '<p>Infelizmente, a garantia do seu equipamento expirou.</p>';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($status === 'Faturado' && $dentroDoPrazo): ?>
                                                        <a href="<?= base_url('home/rma?serial=' . urlencode(isset($_POST['serial']) ? $_POST['serial'] : '')) ?>" class="btn btn-primary" title="Abrir chamado Suporte Técnico"><i class="fas fa-wrench"></i></a>
                                                        <a href="https://drive.usercontent.google.com/download?id=1F9pr02iqQDvo5o1WjybSp1-I3F7ckmOQ&export=download&authuser=1" class="btn btn-secondary" title="Baixar Termo de Garantia"><i class="far fa-file-alt"></i></a>
                                                        <a href="https://drive.google.com/drive/folders/16h2NH8akA5RtVm7FpC2_pKlXs1731IiY?usp=drive_link" class="btn btn-secondary" title="Baixar Drives"><i class="fas fa-download"></i></a>
                                                    <?php elseif ($status === 'Finalizado'): ?>
                                                        <p>Aguardando a retirada</p>
                                                    <?php else: ?>
                                                        <p>Para mais informações, entre em contato.</p>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>Número inserido: <?= isset($_POST['serial']) ? $_POST['serial'] : '' ?></p>
                            <p>Nenhuma informação encontrada para o número de série fornecido.</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section><br><br><br><br><br><br><br><br>

<!-- Adicione links para JavaScript e Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>