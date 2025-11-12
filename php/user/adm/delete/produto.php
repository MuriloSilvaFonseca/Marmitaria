<?php 
    include("../../../../padrao/conexao.php");

    $id_produto = $_REQUEST['id_prod_remover'];

    if (isset($id_produto)) {
        $deleteProd = "DELETE FROM produto WHERE id_produto = '$id_produto'";

        $res = $conn -> query($deleteProd); 
        if ($res == true) {
            echo json_encode([
                'status' => 'sucesso_remover'
            ]);
                
        } else {
            echo json_encode ([
                'status' => "erro"
            ]);
        }
    } else {
        echo json_encode ([
            'status' => "erro"
        ]);
    }
?>