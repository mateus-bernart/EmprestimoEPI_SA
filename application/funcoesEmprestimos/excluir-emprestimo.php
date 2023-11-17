<?php
    // Imports
    require_once '../class/BancoDeDados.php';
    
    // Validação
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id == '') {
        echo "<script>
            alert('Identificador do empréstimo, não encontrado.');
            window.location = '../../controle_emprestimos.php';
        </script>";
        exit;
    }

    // Banco de dados
    $banco = new BancoDeDados;
    $sql = 'DELETE FROM emprestimos WHERE id_emprestimo = ?';
    $params = [$id];
    $banco->executarComando($sql, $params);

    // Mensagem sucesso
    echo "<script>
        alert('Empréstimo removido com sucesso!');
        window.location = '../../controle_emprestimos.php';
    </script>";
