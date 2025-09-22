<?php
    session_start();
    include("../../../../padrao/conexao.php");

    $id_usuario = $_SESSION['id_user_login'];
    $entrega = $_REQUEST['entrega'];
    $status = $_REQUEST['status'];
    $total = $_REQUEST['total'];
    $tipo_pag = $_REQUEST['pagamento'];
    $entrega = $_REQUEST['entrega'];

    $capDatetime = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
    $data_pedido = $capDatetime->format('Y-m-d H:i:s');
    
    $pedido = "INSERT INTO pedido (
                            `id_pedido`,
                            `id_usuario`,
                            `status`,
                            `total`,
                            `desconto`,
                            `tipo_pag`,
                            `entrega`,
                            `data_pedido`
                            )

            VALUES ( 
            default, '{$id_usuario}', '{$status}', '{$total}', default, '{$tipo_pag}', '{$entrega}', '{$data_pedido}')";

    $resPedido = $conn -> query($pedido);

    $id_pedido = $conn -> lastInsertId();
    
    foreach ($_REQUEST['id_prod_carrinho'] as $i => $id_produto) {

        $qtd = $_REQUEST['qtd_prod'][$i];
        $valor_uni = $_REQUEST['vlr_uni'][$i];

        $produto_pedido = "INSERT INTO produto_pedido (
                            `id_pedido`,
                            `id_produto`,
                            `qtd_prod`,
                            `valor_uni`
                            )
                        
                            VALUES ( 
                                '{$id_pedido}', '{$id_produto}', '{$qtd}', '{$valor_uni}')";

        $resProd_pedido = $conn -> query($produto_pedido);
    }
    

    
    exit;

    
?>