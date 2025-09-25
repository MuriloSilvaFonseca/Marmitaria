<?php 
    session_start();
    include("../../../../padrao/conexao.php");

    $sttMod = $_REQUEST['sttMod'];
    $id_pedido = $_REQUEST['id_pedido'];

    

    if($sttMod =='Em andamento' && $res == true) {
        $sql = "UPDATE pedido SET status = '$sttMod' WHERE id_pedido = '$id_pedido'";

        $res = $conn -> query($sql);

        if ($res == true) {
            echo "<script>alert('O pedido está Em andamento');</script>";
            echo "<script>location.href = '../pedidos/pedidos.php';</script>";
        } else {
            echo "<script>alert('O pedido foi possível colocar o pedido em andamento');</script>";
            echo "<script>location.href = '../pedidos/pedidos.php';</script>";
        }

    } elseif ($sttMod =='Negado') {
        $_SESSION['id_pedido'] = $id_pedido;
        echo "<script>location.href = '../pedidos/motivo.php';</script>";

    } elseif ($sttMod == 'Finalizado'){
        $sql = "UPDATE pedido SET status = '$sttMod' WHERE id_pedido = '$id_pedido'";

        $res = $conn -> query($sql);

        if ($res == true) {
            echo "<script>alert('O pedido foi finalizado');</script>";
            echo "<script>location.href = '../pedidos/pedidos.php';</script>";
        } else {
            echo "<script>alert('O pedido foi possível finalizar o pedido');</script>";
            echo "<script>location.href = '../pedidos/pedidos.php';</script>";
        }
        
    } else {
        echo "<script>alert('Não foi possível realizar essa ação');</script>";
        // echo "<script>location.href = '../pedidos/pedidos.php';</script>";
    }
?>

