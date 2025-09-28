<?php

$and = "SELECT 
        p.id_pedido,
        us.nome_usuario,
        p.tipo_pag,
        p.entrega,
        p.status,
        p.data_pedido,
        p.data_comeco,
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
    WHERE p.status = 'Em andamento'
    ORDER BY p.id_pedido DESC;
";

    $resAnd = $conn->query($and);
    $rowsAnd = $resAnd->fetchAll(PDO::FETCH_ASSOC);

    $pedsAndamento = [];

    foreach ($rowsAnd as $rowAnd) {
        
        $idAnd = $rowAnd['id_pedido'];
        if (!isset($pedsAndamento[$idAnd])) {
            $pedsAndamento[$idAnd] = [
                'nome_usuario'    => $rowAnd['nome_usuario'],
                'tipo_pag'    => $rowAnd['tipo_pag'],
                'entrega'     => $rowAnd['entrega'],
                'status'      => $rowAnd['status'],
                'data_pedido' => $rowAnd['data_pedido'],
                'data_comeco' => $rowAnd['data_comeco'],
                'total'       => $rowAnd['total'],
                'produtos'    => []
            ];
        }
        $pedsAndamento[$idAnd]['produtos'][] = [
            'nome'   => $rowAnd['nome_produto'],
            'qtd'    => $rowAnd['qtd_prod'],
            'valor'  => $rowAnd['valor_uni']
        ];   
}
?>