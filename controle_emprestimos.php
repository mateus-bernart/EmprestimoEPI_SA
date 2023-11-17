<?php
    // Controle de sessão
    session_start();
    if (! isset($_SESSION['logado'])) {
        header('LOCATION: index.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA SENAI | Controle de empréstimos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="assets/css/sistema.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .navbar-dark .navbar-nav .nav-link:hover {
    color: #00ff00; /* Replace with the desired green color code */
}
.navbar-dark .navbar-nav .nav-link {
    position: relative;
    color: #808080; /* Gray color */
    transition: color 0.3s ease;
}

.navbar-dark .navbar-nav .nav-link:hover {
    color: #00ff00; /* Green color on hover */
}

.navbar-dark .navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 2px; /* Adjust the thickness of the underline */
    bottom: 0;
    left: 0;
    background-color: #808080; /* Gray color for underline */
    transform: scaleX(0);
    transform-origin: bottom right;
    transition: transform 0.3s ease;
}

.navbar-dark .navbar-nav .nav-link:hover::after {
    transform: scaleX(1);
    transform-origin: bottom left;
}
      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand">Sistema SENAI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="controle_emprestimos.php">Controle de Empréstimos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="crud_equipamentos.php">Controle equipamentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="crud_colaboradores.php">Controle de colabradores</a>
        </li>
      </ul>

    </div>
  </div>
</nav>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Controle de <strong>Empréstimos</strong></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="application/fazer-logout.php" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> <span>Sair</span></a>
                        <a onclick="abrirModal()" class="btn btn-success" data-toggle="modal"><i class="bi bi-plus"></i> <span>Novo Empréstimo</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Colaborador</th>
                        <th>Equipamento</th>
                        <th>CA</th>
                        <th>Quantidade</th>
                        <th>Ações</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Imports
                        require_once 'application/class/BancoDeDados.php';

                        // Banco de Dados
                        $banco = new BancoDeDados;
                        
                        $sql = 'SELECT emprestimos.*, colaboradores.nome AS nome_colaborador, equipamentos.nome AS nome_equipamento
                        FROM emprestimos
                        INNER JOIN colaboradores ON emprestimos.id_colaborador = colaboradores.id_colaborador
                        INNER JOIN equipamentos ON emprestimos.id_equipamento = equipamentos.id_equipamento';

                        $dados = $banco->selecionarRegistros($sql);
                        foreach ($dados as $linha) {
                            echo "<tr>
                                    <td>{$linha['id_emprestimo']}</td>
                                    <td>{$linha['nome_colaborador']}</td>
                                    <td>{$linha['nome_equipamento']}</td>
                                    <td>{$linha['ca']}</td>
                                    <td>{$linha['quantidade']}</td>

                                    <td>
                                        <a onclick='editarEmprestimo({$linha['id_emprestimo']})' class='edit'><i class='bi bi-pencil-fill' data-toggle='tooltip' title='Editar'></i></a>
                                        <a onclick='excluirEmprestimo({$linha['id_emprestimo']})' class='delete'><i class='bi bi-trash-fill' data-toggle='tooltip' title='Excluir'></i></a>
                                    </td>
                                </tr>";
                        }
                    ?>

                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="adicionar-emprestimo" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form_emprestimo" method="post" action="application/funcoesEmprestimos/inserir-emprestimo.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Novo Emprestimo</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="txt_id" id="txt_id">
                        <div class="form-group">
                            <label>Id Colaborador</label>
                            <input type="text" class="form-control" name="txt_colaborador" id="txt_colaborador" required>
                        </div>
                        <div class="form-group">
                            <label>Id Equipamento</label>
                            <textarea class="form-control" name="txt_equipamento" id="txt_equipamento" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>CA</label>
                            <textarea class="form-control" name="txt_ca" id="txt_ca" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Quantidade</label>
                            <textarea class="form-control" name="txt_quantidade" id="txt_quantidade" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script>
        function abrirModal() {
            $('#adicionar-emprestimo').modal('show');
        }

        // Atualizar a página ao fechar o modal, 
        // para garantir que a propriedade ACTION 
        // seja restaurada com o valor original
        $('#adicionar-emprestimo').on('hidden.bs.modal', function() {
            location.reload();
        });

        function editarEmprestimo(idEmprestimo) {
            $.ajax({
                method: 'post',
                url: 'application/funcoesEmprestimos/selecionar-emprestimo.php',
                dataType: 'json',
                data: {
                    id: idEmprestimo
                },
                success: function(retorno) {
                    // Imprimir os dados do retorno no formulário do modal
                    $('#txt_id').val(retorno['id_emprestimo']);
                    $('#txt_colaborador').val(retorno['id_colaborador']);
                    $('#txt_equipamento').val(retorno['id_equipamento']);
                    $('#txt_ca').val(retorno['ca']);
                    $('#txt_quantidade').val(retorno['quantidade']);
                    
                    // Abrir o modal na tela
                    $('#adicionar-emprestimo').modal('show');

                    // Alterar o Action do formulário do modal
                    $('#form_emprestimo').prop('action', 'application/funcoesEmprestimos/alterar-emprestimo.php');
                }
            });
        }

        function excluirEmprestimo(idEmprestimo) {
            var resposta = confirm('Deseja realmente excluir este empréstimo?');
            if (resposta) {
                window.location = 'application/funcoesEmprestimos/excluir-emprestimo.php?id=' + idEmprestimo;
            }
        }
    </script>
</body>
</html>