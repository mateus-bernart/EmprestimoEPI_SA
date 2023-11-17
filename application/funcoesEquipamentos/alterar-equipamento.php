<?php
    // Imports
    require_once '../class/BancoDeDados.php';

    // Validação de Dados
    $id             = isset($_POST['txt_id'])           ? $_POST['txt_id']                              : '';
    $nome           = isset($_POST['txt_nome'])         ? $_POST['txt_nome']                            : '';
    $situacao      = isset($_POST['txt_situacao'])    ? $_POST['txt_situacao']                       : '';

    if ($id == '' || $nome == '' || $situacao == '') {
        echo "<script>
            alert('Existem campos vazios. verifique!');
            window.location = '../../crud_equipamentos.php';
        </script>";
    }

    // Banco de Dados
    $banco = new BancoDeDados;
    $sql = 'UPDATE equipamentos SET nome=?, situacao=? WHERE id_equipamento = ?';
    $params = [$nome, $situacao, $id];
    $banco->executarComando($sql, $params);

    // Mensagem e encaminhar de volta pro sistema
    echo "<script>
        alert('Produto alterado com sucesso!');
        window.location = '../../crud_equipamentos.php';
    </script>";
