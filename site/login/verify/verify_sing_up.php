<?php
    if (isset($_POST['submit'])){
        if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['name']) && !empty($_POST['name'])) {
            session_start();
            require '../../database/settings_db.php';
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM users WHERE email = :email";
            $result = $conn->prepare($sql);
            $result->bindValue('email',$login);
            $result->execute();

            if ($result->rowCount() == 1) {
                header('location: ../sing_up.php?error=ok');
            } else {
                $sql = "INSERT INTO users(user_name, email, pass) VALUES (:user_name, :email, :pass)";
                $result = $conn->prepare($sql);
                $result->bindValue('user_name', $name);
                $result->bindValue('email',$login);
                $result->bindValue('pass',$password);
                $result->execute();
                header('location: ../sing_in.php?success=ok');
            }
        } 
    }