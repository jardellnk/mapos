<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de RMA</title>
    <style>
        /* Estilos CSS aqui */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        #equipamentos {
            margin-bottom: 20px;
        }

        .equipamento {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .equipamento label {
            display: block;
            margin-bottom: 5px;
        }

        .equipamento input[type="text"] {
            width: calc(100% - 80px);
            margin-bottom: 10px;
        }

        .equipamento h2 {
            margin-top: 0;
        }

        #adicionar_equipamento {
            padding: 8px 15px;            
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"] {
            padding: 10px 20px;
           
           
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .button-container button {
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover,
        #adicionar_equipamento:hover,
        #remover_equipamento:hover ,
    </style>
</head>
<body>
    <h1>Formulário de RMA</h1>
    
    <br><br>

    <form id="rmaForm" action="<?= site_url('home/enviar_rma') ?>" method="post">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" required><br>

        <div id="equipamentos">
            <div class="equipamento">
                <h2>Equipamento #1</h2>
                <label for="numero_serie_1">Número de Série:</label>
                <input type="text" name="equipamentos[0][numero_serie]" id="numero_serie_1" value="<?= isset($_GET['serial']) ? htmlspecialchars($_GET['serial']) : '' ?>" required>
                <label for="numero_nfe_1">Número da NFE:</label>
                <input type="text" name="equipamentos[0][numero_nfe]" id="numero_nfe_1" required>
                <label for="numero_empenho_1">Número do Empenho:</label>
                <input type="text" name="equipamentos[0][numero_empenho]" id="numero_empenho_1" required>
                <label for="descricao_defeito_1">Descrição do Defeito:</label>
                <textarea name="equipamentos[0][descricao_defeito]" id="descricao_defeito_1" required style="width: 100%; max-width: 100%; min-height: 100px;"></textarea>

            </div>
        </div>
        <div class="button-container">
            <button type="button" id="adicionar_equipamento" class="btn btn-white btn-sm" >
                <span class="icon-left">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="ml-2">Adicionar</span>
            </button>
            <button type="button" id="remover_equipamento" class="btn btn-white btn-sm" >
                <span class="icon-left">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="ml-2">Remover</span>
            </button>
            <button type="submit" class="btn btn-white btn-sm" >
                <span class="icon-left">
                    <i class="fas fa-paper-plane"></i>
                </span>
                <span class="ml-2">Enviar</span>
            </button>
        </div>



    </form>
    <br><br>
    <script>
        var contadorEquipamentos = 1;
        document.getElementById('adicionar_equipamento').addEventListener('click', function() {
            contadorEquipamentos++;
            var equipamentos = document.getElementById('equipamentos');
            var novoEquipamento = document.createElement('div');
            novoEquipamento.className = 'equipamento';
            novoEquipamento.innerHTML = `
                <h2>Equipamento #${contadorEquipamentos}</h2>
                <label for="numero_serie_${contadorEquipamentos}">Número de Série:</label>
                <input type="text" name="equipamentos[${contadorEquipamentos - 1}][numero_serie]" id="numero_serie_${contadorEquipamentos}" required>
                <label for="numero_nfe_${contadorEquipamentos}">Número da NFE:</label>
                <input type="text" name="equipamentos[${contadorEquipamentos - 1}][numero_nfe]" id="numero_nfe_${contadorEquipamentos}" required>
                <label for="numero_empenho_${contadorEquipamentos}">Número do Empenho:</label>
                <input type="text" name="equipamentos[${contadorEquipamentos - 1}][numero_empenho]" id="numero_empenho_${contadorEquipamentos}" required>
                <label for="descricao_defeito_${contadorEquipamentos}">Descrição do Defeito:</label>
                <textarea name="equipamentos[${contadorEquipamentos - 1}][descricao_defeito]" id="descricao_defeito_${contadorEquipamentos}" required style="width: 100%; max-width: 100%; height: 100px; max-height: 200px;"></textarea>

            `;
            equipamentos.appendChild(novoEquipamento);
        });

        document.getElementById('remover_equipamento').addEventListener('click', function() {
            var equipamentos = document.getElementById('equipamentos');
            var ultimoEquipamento = equipamentos.lastElementChild;
            if (ultimoEquipamento && confirm('Tem certeza de que deseja remover o último equipamento adicionado?')) {
                equipamentos.removeChild(ultimoEquipamento);
                contadorEquipamentos--;
            }
        });

        // Adicionar evento para exibir alerta após o envio do formulário
        document.getElementById('rmaForm').addEventListener('submit', function() {
            alert('O formulário foi enviado com sucesso! Entraremos em contato em breve.');
        });
    </script>
</body>
</html>
