<?php 
    include("../../../../padrao/conexao.php");

    $id_pedido = $_REQUEST['id_pedido'];
    $motivo = $_REQUEST['motivo'];

    $sql = "UPDATE pedido SET motivo = '$motivo', status = 'Cancelado' WHERE id_pedido =  '$id_pedido'";
    $res = $conn -> query($sql);

    if ($res == true && !empty($id_pedido = $_REQUEST['id_pedido'])) {
        echo "<script>alert('Pedido cancelado com sucesso.')</script>";
        echo "<script>location.href = '../pedido/confPedido.php'</script>";
        
    } else {
        echo "<script>alert('Não foi possível enviar o motivo.')</script>";
        echo "<script>location.href = '../pedido/confPedido.php'</script>";
    }
?>