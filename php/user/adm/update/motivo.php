<?php 
    session_start();
    include("../../../../padrao/conexao.php");

    $id_pedido = $_SESSION['id_pedido'];
    $motivo = $_REQUEST['motivo'];

    $sql = "UPDATE pedido SET motivo = '$motivo', status = 'Negado' WHERE id_pedido =  '$id_pedido'";
    $res = $conn -> query($sql);

    if ($res == true) {
        unset($_SESSION['id_pedido']);
        echo "<script>alert('Motivo enviado com sucesso.')</script>";
        echo "<script>location.href = '../pedidos/pedidos.php'</script>";
        
    } else {
        echo "<script>alert('Não foi possível enviar o motivo.')</script>";
        echo "<script>location.href = '../pedidos/motivo.php'</script>";
    }
?>