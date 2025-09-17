<?php

    //Usuário
    $email_valid = $_SESSION['email_login'];
    $id_user_login = $_SESSION['id_user_login'];

    $sql = "SELECT nome_usuario, email, senha, telefone, cpf, dt_nascimento FROM usuario WHERE id_usuario = '$id_user_login'";

    $res = $conn -> query($sql);

    $user = $res -> fetch(PDO::FETCH_ASSOC);

    //Enderço

    $sql2 = "SELECT endereco, num_casa, bairro, cidade, estado, complemento, cep FROM endereco WHERE id_usuario = '$id_user_login'";

    $res2 = $conn -> query($sql2);

    $end = $res2 -> fetch(PDO::FETCH_ASSOC);
?>