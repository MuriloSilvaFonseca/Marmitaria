<?php
    session_start();
    unset($_SESSION["email_login"]);
    unset($_SESSION["id_user_login"]);

    header("Location: ../../../index.php");
?>