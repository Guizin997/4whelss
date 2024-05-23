<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location: login/sing_in.php');
        die();
    }
    require 'template/header.php';    
?>

<h1>É isso aí paizão</h1>

<?php
require 'template/footer.php';
?>