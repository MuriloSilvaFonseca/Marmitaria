<?php
    
    $email_valid = $_SESSION['email_login'];

    $sql = "SELECT nome_usuario, email, senha, telefone, cpf, dt_nascimento FROM usuario WHERE email = '$email_valid'";

    $res = $conn -> $sql;

    $linha = $res -> fetch(PDO::FETCH_ASSOC);


?>