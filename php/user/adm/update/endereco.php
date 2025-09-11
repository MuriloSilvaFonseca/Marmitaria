<?php
    session_start();

    include("../../../../padrao/conexao.php");

    $id_usuario_endereco = $_SESSION['id_usuario_endereco'];

    $endereco = $_REQUEST["endereco"];
    $bairro = $_REQUEST["bairro"];
    $cidade = $_REQUEST["cidade"];
    $estado = $_REQUEST["estado"];
    $complemento = $_REQUEST["complemento"];
    $num_casa = $_REQUEST["num_casa"];
    $cep = $_REQUEST["cep"];

    $sql = "UPDATE endereco
            SET endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado', complemento = '$complemento', num_casa = '$num_casa', cep = '$cep'
            WHERE id_usuario = '$id_usuario_endereco'";

    $res = $conn -> query($sql);

    if ($res == true) {

        echo "<script>alert('Editado com sucesso');</script>";

        echo "<script>location.href='../admClientes/listEndereco.php';</script>";
        
    } else {
        echo "alert('Não foi possível Editar')";

        echo "<script>location.href='../admClientes/editar-endereco.php';</script>";
    }
?>