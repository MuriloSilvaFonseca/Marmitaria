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
            echo json_encode([
                'status' => 'sucesso',
                'status_cliente' => $status == 'Ativo' ? 'Inativo' : 'Ativo',
                'condicao_status' => $status == 'Ativo' ? 'Inativo' : 'Ativo',
                'btn_status' =>  $status == 'Ativo' ? '✅' : '⛔'
            ]);
        } else {
            echo json_encode([
                'status' => 'erro'
            ]);
        }

    } else {
        echo "<script>alert('Não foi possivel mudar o status');</script>";
    }
?>