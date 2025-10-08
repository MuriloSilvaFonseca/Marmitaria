<?php 
    include("../../../../padrao/conexao.php");

    $id_usuario = $_REQUEST['id_user_status'];
    $status = $_REQUEST['condicao_status'];

    if (isset($id_usuario) && isset($status)) {

        if ($status == 'Ativo') {
            $sql = "UPDATE usuario 
                    SET status='Inativo' 
                    WHERE id_usuario = '$id_usuario' ";

        } else if ($status == 'Inativo') {
            $sql = "UPDATE usuario 
                    SET status='Ativo' 
                    WHERE id_usuario = '$id_usuario'";
        }

        $res = $conn -> query($sql);

        if ($res == true) {
            echo "<script>alert('Status modificado com sucesso');</script>";
        } else {
            echo "<script>alert('Não foi possivel mudar o status');</script>";
        }

    } else {
        echo "<script>alert('Não foi possivel mudar o status');</script>";
    }
?>