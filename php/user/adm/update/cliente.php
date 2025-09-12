<?php
    session_start();

    include("../../../../padrao/conexao.php");

    $id_usuario = $_SESSION['id-usuario'];

    $nome_usuario = $_REQUEST["nome_usuario"];
    $email = $_REQUEST["email"];
    $telefone = $_REQUEST["telefone"];
    $cpf = $_REQUEST["cpf"];
    $dt_nascimento = $_REQUEST["dt_nascimento"];

    $sql = "UPDATE usuario
            SET nome_usuario = '$nome_usuario', email = '$email', telefone = '$telefone', cpf = '$cpf', dt_nascimento = '$dt_nascimento'
            WHERE id_usuario = '$id_usuario'";

    $res = $conn -> query($sql);

    if ($res == true) {
        unset($_SESSION['id-usuario']);

        echo "<script>alert('Editado com sucesso');</script>";

        echo "<script>location.href='../admClientes/listagem-clientes.php';</script>";
        
    } else {
        echo "alert('Não foi possível Editar')";

        echo "<script>location.href='../admClientes/editar';</script>";
    }
?>