<?php

$neg = "SELECT 
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
    WHERE p.status = 'Negado'
    ORDER BY p.id_pedido DESC;
";

    $resNeg = $conn->query($neg);
    $rowsNeg = $resNeg->fetchAll(PDO::FETCH_ASSOC);

    $pedsNegado = [];

    foreach ($rowsNeg as $rowNeg) {
        
        $idNeg = $rowNeg['id_pedido'];
        if (!isset($pedsNegado[$idNeg])) {
            $pedsNegado[$idNeg] = [
                'nome_usuario'=> $rowNeg['nome_usuario'],
                'tipo_pag'    => $rowNeg['tipo_pag'],
                'entrega'     => $rowNeg['entrega'],
                'status'      => $rowNeg['status'],
                'data_pedido' => $rowNeg['data_pedido'],
                'total'       => $rowNeg['total'],
                'motivo'      => $rowNeg['motivo'],
                'produtos'    => []
            ];
        }
        $pedsNegado[$idNeg]['produtos'][] = [
            'nome'   => $rowNeg['nome_produto'],
            'qtd'    => $rowNeg['qtd_prod'],
            'valor'  => $rowNeg['valor_uni']
        ];   
}
?>