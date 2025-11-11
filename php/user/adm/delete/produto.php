<?php 
    include("../../../../padrao/conexao.php");

    $id_produto = $_REQUEST['id_prod_remover'];

    if (isset($id_produto)) {
        $verificaHist = "SELECT * FROM produto_pedido WHERE id_produto = $id_produto";
        $resHist = $conn -> query($verificaHist);
        $linhaHist = $resHist -> rowCount();
        
        if ($linhaHist == "0") {
            $deleteProd = "DELETE FROM produto WHERE id_produto = '$id_produto'";

            $res = $conn -> query($deleteProd); 
            if ($res == true) {
                echo json_encode([
                    'status' => 'sucesso'
                ]);
                    
            } else {
                echo json_encode ([
                    'status' => "erro"
                ]);
            }
        } else {

        }
    } else {
        echo json_encode ([
            'status' => "erro"
        ]);
    }
?>