<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: login/login_sing_in.php');
}
?>
<h1>Essa é a Dashboard</h1>