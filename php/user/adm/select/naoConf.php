<?php

$sql = "SELECT 
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
    WHERE p.status = 'Não confirmado'
    ORDER BY p.id_pedido DESC
";

    $res = $conn->query($sql);
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);

    $pedidos = [];

    foreach ($rows as $row) {
        
        $id = $row['id_pedido'];
        if (!isset($pedidos[$id])) {
            $pedidos[$id] = [
                'tipo_pag'    => $row['tipo_pag'],
                'entrega'     => $row['entrega'],
                'status'      => $row['status'],
                'data_pedido' => $row['data_pedido'],
                'total'       => $row['total'],
                'produtos'    => []
            ];
        }
        $pedidos[$id]['produtos'][] = [
            'nome'   => $row['nome_produto'],
            'qtd'    => $row['qtd_prod'],
            'valor'  => $row['valor_uni']
        ];   
}
?>