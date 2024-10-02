<div class="row-fluid">
    <div id="footer" class="span12">
        <a class="pecolor" href="https://github.com/jardellnk" target="_blank">
            <?= date('Y') ?> &copy; ma-OStore - Versão: <?= $this->config->item('app_version') ?>
        </a>
<p>Créditos a <a href="https://github.com/RamonSilva20/mapos" target="_blank" rel="noopener noreferrer"><?= date('Y'); ?> &copy; Ramon Silva</a></p>
</div>
    
</div>



<!--end-Footer-part-->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/matrix.js"></script>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        var dataTableEnabled = '<?= $configuration['control_datatable'] ?>';
        if(dataTableEnabled == '1') {
            $('#tabela').dataTable( {
                "ordering": false,
                "info": false,
                "language": {
                    "url": "<?= base_url() ?>assets/js/dataTable_pt-br.json",
                },
                "oLanguage": {
                    "sSearch": "Pesquisa rápida na tabela abaixo:"
                }
            } );
        }
    } );
</script>
</html>
