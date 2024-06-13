<?php
session_start();
session_unset();
session_destroy();
header('location: ../login/sing_in.php');