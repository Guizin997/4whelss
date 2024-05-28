<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: login/login_sing_in.php');
    die();
}
require 'database/settings_db.php';

$sql = "SELECT user_name FROM users WHERE email = :email";
$result = $conn->prepare($sql);
$result->bindValue('email', $_SESSION['id']);
$result->execute();
$row = $result->fetch();
if ($row) {
  $userName = $row['user_name'];
} else {
  $userName = "Nome do Usuário";
}
?>

<!DOCTYPE html>
<html lang="pt-br" class=">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>4 whelss</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="style/index_custom.css">
</head>
<body>
<nav class="navbar fixed-top" id="navbar">
  <div class="container-fluid  d-flex justify-content-between">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <img src="images/logo_4whelss.png" style="width: 60px; border-radius: 50%; background-color: #1c5052;" alt="4 Whelss">
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header off-canva">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $userName;?>
              </a>
              <ul class="dropdown-menu" id="dropdown-bg">
              <li><a class="dropdown-item fw-bolder text-danger" id="logout-bg" href="login/verify/logout_verify.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body off-canva">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php"><p>Pagina inicial</p></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          </div>
        </ul>
      </div>
    </div>
  </div>
</nav>