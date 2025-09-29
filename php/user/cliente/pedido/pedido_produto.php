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

    foreach ($_REQUEST['id_prod_carrinho'] as $i => $id_produto) {
        $qtd = $_REQUEST['qtd_prod'][$i];
        $valor_uni = $_REQUEST['vlr_uni'][$i];

    
        $pegaEst = "SELECT qtd_est FROM produto WHERE id_produto = '{$id_produto}'";
        $resPegaEst = $conn -> query($pegaEst);
        $qtd_est = $resPegaEst -> fetch(PDO::FETCH_ASSOC);

       if ($resPegaEst == true && $qtd_est["qtd_est"] >= $qtd) {
            $subQtd = (int)$qtd_est["qtd_est"] - (int)$qtd;

            $mudaEst = "UPDATE produto SET qtd_est='{$subQtd}' WHERE id_produto = '{$id_produto}'";
            $resMudaEst = $conn -> query($mudaEst);
        } else {
            echo "<script>alert('Não foi possível finalizar a compra')</script>";
            echo "<script>location.href='confPedido.php'</script>";
            exit;
        }
    }
    
    $pedido = "INSERT INTO pedido (
                            `id_pedido`,
                            `id_usuario`,
                            `status`,
                            `total`,
                            `desconto`,
                            `tipo_pag`,
                            `entrega`,
                            `data_pedido`,
                            `motivo`
                            )

            VALUES ( 
            default, '{$id_usuario}', '{$status}', '{$total}', default, '{$tipo_pag}', '{$entrega}', '{$data_pedido}', NULL)";

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

    if($resPedido == true) {
        echo "<script>alert('Pedido confirmado!);</script>";
        echo "<script>location.href='confPedido.php'</script>";
    }
?>