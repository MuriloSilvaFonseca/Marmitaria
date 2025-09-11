<?php 
    include("../../../../padrao/conexao.php");

    $id_usuario = $_REQUEST['id_user_excluir'];
    

    if (isset($id_usuario)) {
        $deleteEndereco = "DELETE FROM endereco
                WHERE id_usuario = '$id_usuario'";

        $deleteUser = "DELETE FROM usuario
                WHERE id_usuario = '$id_usuario'";

        $res = $conn -> query($deleteEndereco);

        $res2 = $conn -> query($deleteUser);

        if ($res == true && $res2 == true) {
            echo "<script>alert('Excluido com sucesso')</script>";
            echo "<script>location.href='../admClientes/listagem-clientes.php';</script>";
        } else {
            echo "<script>alert('Não foi possivel excluir');</script>";
            echo "<script>location.href='../admClientes/listagem-clientes.php';</script>";
        }
    } else {
        echo "<script>alert('Não foi possivel excluir.Cliente não encontrado');</script>";

        echo "<script>location.href='../admClientes/listagem-clientes.php';</script>";
    }
?>