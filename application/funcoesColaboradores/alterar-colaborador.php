<?php
    // Imports
    require_once '../class/BancoDeDados.php';

    // Validação de Dados
    $id             = isset($_POST['txt_id'])           ? $_POST['txt_id']                              : '';
    $nome       = isset($_POST['txt_nome'])         ? $_POST['txt_nome']    : '';
    $email     = isset($_POST['txt_email'])     ? $_POST['txt_email'] : '';
    $funcao     = isset($_POST['txt_funcao'])     ? $_POST['txt_funcao'] : '';
    $data_a     = isset($_POST['txt_data'])     ? $_POST['txt_data'] : '';
    $turno     = isset($_POST['txt_turno'])     ? $_POST['txt_turno'] : '';

    if ($id == '' || $nome == '' || $email == '' || $funcao == '' || $data_a == ''|| $turno == '') {
        echo "<script>
            alert('Existem campos vazios. verifique!');
            window.location = '../../crud_colaboradores.php';
        </script>";
    }

    // Banco de Dados
    $banco = new BancoDeDados;
    $sql = 'UPDATE colaboradores SET nome=?, email=?, funcao=?, data_admissao=?, turno=? WHERE id_colaborador = ?';
    $params = [$nome, $email, $funcao, $data_a, $turno, $id];
    $banco->executarComando($sql, $params);

    // Mensagem e encaminhar de volta pro sistema
    echo "<script>
        alert('Colaborador alterado com sucesso!');
        window.location = '../../crud_colaboradores.php';
    </script>";
