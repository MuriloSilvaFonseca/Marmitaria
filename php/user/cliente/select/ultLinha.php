<?php
    $id_usuario = $_SESSION['id_user_login'];

    $ultLinSql = "SELECT 
                p.id_pedido,
                p.tipo_pag,
                p.entrega,
                p.status,
                p.data_pedido,
                p.total,
                prd.nome_produto,
                pp.qtd_prod,
                pp.valor_uni
            FROM pedido p

            INNER JOIN produto_pedido pp 
                ON p.id_pedido = pp.id_pedido
            INNER JOIN produto prd 
                ON pp.id_produto = prd.id_produto

            WHERE p.id_usuario = '$id_usuario'
            ORDER BY p.id_pedido DESC";

    $ultLinRes = $conn->query($sql);
?>