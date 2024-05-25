<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location: login/login_sing_in.php');
        die();
    }
    require 'template/header.php';
    ?>

    <h1 style="margin-top: 70px;">
        conteúdo aqui
    </h1>

<?php
require 'template/footer.php';
?>