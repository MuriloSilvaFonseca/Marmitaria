<?php 
    $sql = "SELECT id_usuario, nome_usuario, email, telefone, cpf, dt_nascimento, tipo_usuario, status FROM usuario WHERE tipo_usuario = 'Cliente'";
    $res = $conn -> query($sql);

    $lista = $res -> fetchAll(PDO::FETCH_ASSOC);

    $id_endereco = $res -> fetch();

    $row = $res -> rowCount();
?>