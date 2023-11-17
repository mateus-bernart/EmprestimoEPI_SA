<?php
    // Imports
    require_once '../class/BancoDeDados.php';

    // Validação de Dados
    $id                     = isset($_POST['txt_id'])                   ? $_POST['txt_id']                              : '';
    $colaborador            = isset($_POST['txt_colaborador'])          ? $_POST['txt_colaborador']                     : '';
    $equipamento            = isset($_POST['txt_equipamento'])          ? $_POST['txt_equipamento']                     : '';
    $ca                     = isset($_POST['txt_ca'])                   ? $_POST['txt_ca']                              : '';
    $quantidade            = isset($_POST['txt_quantidade'])           ? $_POST['txt_quantidade']                      : '';


    if ($id == '' || $colaborador == '' || $equipamento == '' || $ca == '' || $quantidade == '') {
        echo "<script>
            alert('Existem campos vazios. verifique!');
            window.location = '../../controle_emprestimos.php';
        </script>";
    }

    // Banco de Dados
    $banco = new BancoDeDados;
    $sql = 'UPDATE emprestimos SET id_colaborador=?, id_equipamento=?, ca=?, quantidade=? WHERE id_emprestimo = ?';
    $params = [$colaborador, $equipamento, $ca, $quantidade, $id,];
    $banco->executarComando($sql, $params);

    // Mensagem e encaminhar de volta pro sistema
    echo "<script>
        alert('Empréstimo alterado com sucesso!');
        window.location = '../../controle_emprestimos.php';
    </script>";
