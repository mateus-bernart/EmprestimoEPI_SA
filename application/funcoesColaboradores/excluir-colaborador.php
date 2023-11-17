<?php
    // Imports
    require_once '../class/BancoDeDados.php';
    
    // Validação
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id == '') {
        echo "<script>
            alert('Identificador do produto, não encontrado.');
            window.location = '../../crud_colaboradores.php';
        </script>";
        exit;
    }

    // Banco de dados
    $banco = new BancoDeDados;
    $sql = 'DELETE FROM colaboradores WHERE id_colaborador = ?';
    $params = [$id];
    $banco->executarComando($sql, $params);

    // Mensagem sucesso
    echo "<script>
        alert('Colaborador removido com sucesso!');
        window.location = '../../crud_colaboradores.php';
    </script>";
