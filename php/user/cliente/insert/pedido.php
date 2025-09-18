<?php 
    session_start();

    include("../../../../padrao/conexao.php");

    $id_prod_carrinho = $_REQUEST['id_produto_carrinho'];
    $qtd_prod = $_REQUEST['qtd_prod'];
    $vlr_uni = $_REQUEST['vlr_uni'];
    $total = $_REQUEST['total'];

    $pedido = [];

    for ($i = 0; $i < count($id_prod_carrinho); $i++) {
        $pedido[] = [
            "id_prod_carrinho" => $id_prod_carrinho[$i],
            'vlr_uni' => $vlr_uni[$i],
            "qtd" => $qtd_prod[$i]
        ];
    }

    print_r($pedido);

    foreach ($pedido as $obj) {
        $sql = "INSERT INTO produto_pedido VALUES ";
    }


?>