<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location: login/login_sing_in.php');
        die();
    }
    require 'template/header.php';
    ?>
<div>
    <h1>Bem-vindo </h1>
</div>

<?php
require 'template/footer.php';
?>