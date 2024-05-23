<?php
    if (isset($_POST['submit'])){
        if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {
            session_start();
            require '../../database/settings_db.php';
            $login = $_POST['login'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM users WHERE email = :email AND pass = :pass";
            $result = $conn->prepare($sql);
            $result->bindValue('email',$login);
            $result->bindValue('pass',$password);
            $result->execute();

            if ($result->rowCount() == 1) {
                $data = $result->fetch();

                $_SESSION['id'] = $data['email'];
                header('location: ../../index.php');
            } else {
                header('location: ../sing_in.php?error=ok');
            }
        } 
    }