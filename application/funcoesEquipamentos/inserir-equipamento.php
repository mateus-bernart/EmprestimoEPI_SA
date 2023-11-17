<?php
    // Imports
    require_once '../class/BancoDeDados.php';

    // Validação de Dados
    $nome       = isset($_POST['txt_nome'])         ? $_POST['txt_nome']    : '';
    $situacao     = isset($_POST['txt_situacao'])     ? $_POST['txt_situacao'] : '';
    
    if ($nome == '' || $situacao == '') {
        echo "<script>
            alert('Existem campos vazios. verifique!');
            window.location = '../../sistema.php';
        </script>";
    }


    // Banco de Dados
    $banco = new BancoDeDados;
    $sql = 'INSERT INTO equipamentos (nome, situacao) VALUES (?,?)';
    $params = [$nome, $situacao];
    $banco->executarComando($sql, $params);

    // Mensagem e encaminhar de volta pro sistema
    echo "<script>
        alert('Equipamento cadastrado com sucesso!');
        window.location = '../../crud_equipamentos.php';
    </script>";
