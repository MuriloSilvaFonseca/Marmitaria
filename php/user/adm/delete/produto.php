<?php 
    include("../../../../padrao/conexao.php");

    $id_produto = $_REQUEST['id_prod_remover'];

    if (isset($id_produto)) {
        $pedido_produto = "SELECT * FROM produto_pedido WHERE id_produto = '$id_produto'";
        $resPedProd = $conn -> query($pedido_produto);

        $pegaLinha = $resPedProd -> fetchAll();
        $contaLinha = count($pegaLinha);

        if ($contaLinha >= 0) {
            $delPedido_produto = "DELETE FROM produto_pedido WHERE id_produto = '$id_produto'";

            $resDelPedProd = $conn -> query($delPedido_produto);

            if ($resDelPedProd != true) {
                echo json_encode ([
                    "status" 
                ]);
                return;
            }
        }

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