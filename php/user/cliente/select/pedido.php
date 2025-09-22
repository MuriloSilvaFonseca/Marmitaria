<?php
    $id_usuario = $_SESSION['id_user_login'];

    $selectJoin = "SELECT p.id_pedido, pp.id_produto, prd.nome_produto, pp.valor_uni, pp.qtd_prod, p.tipo_pag, p.entrega, p.status, p.data_pedido  

	               FROM usuario us
    
	               INNER JOIN pedido p 
                   ON (us.id_usuario = p.id_usuario AND p.id_pedido = '' AND us.id_usuario = '$id_usuario')
    
                   INNER JOIN produto prd
    
                   INNER JOIN produto_pedido pp
                   ON (prd.id_produto = pp.id_produto AND p.id_pedido = pp.id_pedido);";

    $resJoin = $conn -> query($selectJoin);


?>