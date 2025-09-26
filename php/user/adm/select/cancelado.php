<?php

$can = "SELECT 
        p.id_pedido,
        us.nome_usuario,
        p.tipo_pag,
        p.entrega,
        p.status,
        p.data_pedido,
        p.total,
        p.motivo,
        prd.nome_produto,
        pp.qtd_prod,
        pp.valor_uni
    FROM pedido p

    INNER JOIN produto_pedido pp 
        ON p.id_pedido = pp.id_pedido
    INNER JOIN produto prd 
        ON pp.id_produto = prd.id_produto
	INNER JOIN usuario us
		ON p.id_usuario = us.id_usuario
    WHERE p.status = 'Cancelado'
    ORDER BY p.id_pedido DESC;
";

    $resCan = $conn->query($can);
    $rowsCan = $resCan->fetchAll(PDO::FETCH_ASSOC);

    $pedsCancelado = [];

    foreach ($rowsCan as $rowCan) {
        
        $idCan = $rowCan['id_pedido'];
        if (!isset($pedsCancelado[$idCan])) {
            $pedsCancelado[$idCan] = [
                'nome_usuario'=> $rowCan['nome_usuario'],
                'tipo_pag'    => $rowCan['tipo_pag'],
                'entrega'     => $rowCan['entrega'],
                'status'      => $rowCan['status'],
                'data_pedido' => $rowCan['data_pedido'],
                'total'       => $rowCan['total'],
                'motivo'      => $rowCan['motivo'],
                'produtos'    => []
            ];
        }
        $pedsCancelado[$idCan]['produtos'][] = [
            'nome'   => $rowCan['nome_produto'],
            'qtd'    => $rowCan['qtd_prod'],
            'valor'  => $rowCan['valor_uni']
        ];   
}
?>