<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location: login/login_sing_in.php');
    }
    require 'template/header.php';
?>

<h1>É isso aí paizão</h1>

<?php
require 'template/footer.php';
?>