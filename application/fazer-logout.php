<?php
    // Destruir Sessão
    session_start();
    session_destroy();

    // Encaminar para a página inicial
    header('LOCATION: ../index.php');