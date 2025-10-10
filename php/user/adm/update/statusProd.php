<?php 
    include("../../../../padrao/conexao.php");

    $id_produto = $_REQUEST['id_produto'];
    $status = $_REQUEST['condicao_status'];

    if (isset($id_produto) && isset($status)) {

        if ($status == 'Disponível') {
            $sql = "UPDATE produto 
                    SET status='Indisponível' 
                    WHERE id_produto = '$id_produto' ";

        } else if ($status == 'Indisponível') {
            $sql = "UPDATE produto 
                    SET status='Disponível' 
                    WHERE id_produto = '$id_produto'";
        }

        $res = $conn -> query($sql);

        if ($res == true) {
            echo json_encode([
                'status' => 'sucesso',
                'status_produto' => $status == 'Disponível' ? 'Indísponivel' : 'Disponível',
                'condicao_status' => $status == 'Disponível' ? 'Inativo' : 'Disponível',
                'btnSttsProd' => $status == 'Disponível' ? '⛔' : '✅' 
            ]);
            
            
        } else {
            echo "<script>alert('Não foi possivel mudar o status');</script>";
        }

    } else {
        echo "<script>alert('Não foi possivel mudar o status');</script>";

    }
?>