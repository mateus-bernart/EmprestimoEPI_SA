<?php
    // Imports
    require_once '../class/BancoDeDados.php';
    
    // Validação
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id == '') {
        echo "<script>
            alert('Identificador do equipamento, não encontrado.');
            window.location = '../../crud_equipamentos.php';
        </script>";
        exit;
    }

    // Banco de dados
    $banco = new BancoDeDados;
    $sql = 'DELETE FROM equipamentos WHERE id_equipamento = ?';
    $params = [$id];
    $banco->executarComando($sql, $params);

    // Mensagem sucesso
    echo "<script>
        alert('Equipamento removido com sucesso!');
        window.location = '../../crud_equipamentos.php';
    </script>";
