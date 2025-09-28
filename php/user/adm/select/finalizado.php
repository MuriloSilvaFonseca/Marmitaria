<?php

$fin = "SELECT 
        p.id_pedido,
        us.nome_usuario,
        p.tipo_pag,
        p.entrega,
        p.status,
        p.data_pedido,
        p.data_comeco,
        p.data_final,
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
    WHERE p.status = 'Finalizado'
    ORDER BY p.id_pedido DESC;
";

    $resFin = $conn->query($fin);
    $rowsFin = $resFin->fetchAll(PDO::FETCH_ASSOC);

    $pedsFinalizado = [];

    foreach ($rowsFin as $rowFin) {
        
        $idFin = $rowFin['id_pedido'];
        if (!isset($pedsFinalizado[$idFin])) {
            $pedsFinalizado[$idFin] = [
                'nome_usuario'=> $rowFin['nome_usuario'],
                'tipo_pag'    => $rowFin['tipo_pag'],
                'entrega'     => $rowFin['entrega'],
                'status'      => $rowFin['status'],
                'data_pedido' => $rowFin['data_pedido'],
                'data_comeco' => $rowFin['data_comeco'],
                'data_final'  => $rowFin['data_final'],
                'total'       => $rowFin['total'],
                'produtos'    => []
            ];
        }
        $pedsFinalizado[$idFin]['produtos'][] = [
            'nome'   => $rowFin['nome_produto'],
            'qtd'    => $rowFin['qtd_prod'],
            'valor'  => $rowFin['valor_uni']
        ];   
}
?>