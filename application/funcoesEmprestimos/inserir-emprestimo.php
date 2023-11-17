<?php
    // Imports
    require_once '../class/BancoDeDados.php';

    // Validação de Dados
    $colaborador            = isset($_POST['txt_colaborador'])               ? $_POST['txt_colaborador']    : '';
    $equipamento            = isset($_POST['txt_equipamento'])                 ? $_POST['txt_equipamento'] : '';
    $ca                     = isset($_POST['txt_ca'])                   ? $_POST['txt_ca']                              : '';
    $quantidade            = isset($_POST['txt_quantidade'])           ? $_POST['txt_quantidade']                      : '';
    
    if ($colaborador == '' || $equipamento == '' || $ca == '' || $quantidade == '') {
        echo "<script>
            alert('Existem campos vazios. verifique!');
            window.location = '../../crud_colaboradores.php';
        </script>";
    }


    // Banco de Dados
    $banco = new BancoDeDados;
    $sql = 'INSERT INTO emprestimos (id_colaborador, id_equipamento, ca, quantidade) VALUES (?, ?, ?, ?)';
   
    $params = [$colaborador, $equipamento, $ca, $quantidade];
    $banco->executarComando($sql, $params);
   

    // Mensagem e encaminhar de volta pro sistema
    echo "<script>
        alert('Empréstimo cadastrado com sucesso!');
        window.location = '../../controle_emprestimos.php';
    </script>";
