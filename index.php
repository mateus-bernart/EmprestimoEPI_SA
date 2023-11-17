<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - CONTROLE DE EMPRÉSTIMOS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="assets/css/login.css" rel="stylesheet">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <main class="form-signin">
        <form method="post" action="application/fazer-login.php">
            <h1 class="h3 mb-3 fw-normal">Login:</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="txt_email" name="txt_email" required>
                <label for="txt_email">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="txt_senha" name="txt_senha" required>
                <label for="txt_senha">Senha</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
        </form>
    </main>
</div>

</body>
</html>
