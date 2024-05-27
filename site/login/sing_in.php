<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 Whelss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/login_custom.css">
</head>
<body class="vh-100" id="bg">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="card-body">
                <form data-parsley-validate action="verify/verify_sing_in.php" method="post">
                    <div>
                        <img src="../images/logo_4whelss.png" alt="4Whelss" class="logo_system">
                    </div>
                    <div class="w-100 mb-2 d-flex justify-content-center">
                        <h1>Login</h1>
                    </div>
                    <?php
                        if (isset($_GET['success'])) {
                            if ($_GET['success'] == "ok") {
                                echo '
                                    <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                                        Usuário cadastrado com sucesso!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                            }
                        }

                        if(isset($_GET['error'])) {
                            if($_GET['error'] == "ok") {
                                echo '
                                <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                                    <strong>Email e/ou senha incorreto(s)!</strong> Por favor, tente novamente.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                        }
                    ?>
                    <div class="mb-3">
                        <label for="login" class="form-label">E-mail<span style="color: red;">*</span></label>
                        <input type="email" class="form-control border border-1 border-secondary" id="login" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha<span style="color: red;">*</span></label>
                        <input type="password" class="form-control border border-1 border-secondary" id="password" name="password" required>
                    </div>
                    <h6>Não possui uma conta? <a href="sing_up.php">Cadastrar-se</a></h6>
                    <input type="submit" name="submit" value="Entrar" class="btn mb-2 mt-4 w-100" id="button-color">
                </form>
            </div>
        </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../parsley/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../parsley/node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="../parsley/node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
    <link rel="stylesheet" href="../parsley/node_modules/parsleyjs/src/parsley.css">
</body>
</html>