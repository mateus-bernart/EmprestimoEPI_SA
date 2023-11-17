<?php
    // Imports
    require_once 'class/BancoDeDados.php';

    // Validação de dados
    $email  =   isset($_POST['txt_email']) ? $_POST['txt_email'] : '';
    $senha  =   isset($_POST['txt_senha']) ? $_POST['txt_senha'] : '';
    if ($email == '' || $senha == '') {
        echo "<script>
            alert('Existem campos vazios. Verifique!');
            window.location = '../index.php';
        </script>";
        exit;
    }

    // Consulta no Banco
    $banco = new BancoDeDados;
    $sql = 'SELECT COUNT(id_usuario) AS total,
            id_usuario,
            nome 
            FROM usuarios 
            WHERE email = ? AND senha = ?';
    $params = [$email, $senha];
    $dados = $banco->selecionarRegistro($sql, $params);

    // Verificando resultado
    if ($dados['total'] > 0) {
        session_start();
        $_SESSION['logado']     = true;
        $_SESSION['id_usuario'] = $dados['id_usuario'];
        $_SESSION['nome']       = $dados['nome'];
        header('LOCATION: ../menu2.php');
    } else {
        echo "<script>
            alert('Usuário ou senha inválidos!');
            window.location = '../index.php';
        </script>";
    }
?>