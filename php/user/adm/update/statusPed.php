<?php 
    session_start();
    include("../../../../padrao/conexao.php");

    $sttMod = $_REQUEST['sttMod'];
    $id_pedido = $_REQUEST['id_pedido'];
    $saida = isset($_REQUEST['saida']) ? $_REQUEST['saida'] : null;


    $capDatetime = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));

    if($sttMod =='Em andamento') {

        $data_comeco = $capDatetime->format('Y-m-d H:i:s');
        $sql = "UPDATE pedido SET status = '$sttMod', data_comeco = '$data_comeco' WHERE id_pedido = '$id_pedido'";

        $res = $conn -> query($sql);

        if ($res == true) {
            if ($saida == 'home-adm') {
                echo json_encode([
                    'status' => 'success',
                    'id_pedido_resp' => $id_pedido,
                    'data_inicio' => date('d/m/Y H:i', strtotime($data_comeco))
                ]);
            } else {
                echo "<script>location.href = '../pedidos/pedidos.php';</script>";
            }
            
        } else {
            echo "<script>alert('O pedido foi possível colocar o pedido em andamento');</script>";
            echo "<script>location.href = '../pedidos/pedidos.php';</script>";
        }

    } elseif ($sttMod =='Negado') {
        $_SESSION['id_pedido'] = $id_pedido;
        echo "<script>location.href = '../pedidos/motivo.php';</script>";

    } elseif ($sttMod == 'Finalizado'){
        
        $data_final = $capDatetime->format('Y-m-d H:i:s');
        
        $sql = "UPDATE pedido SET status = '$sttMod', data_final = '$data_final' WHERE id_pedido = '$id_pedido'";
        
        $res = $conn -> query($sql);

        if ($res == true) {
            echo json_encode([
                'status' => 'sucesso'
            ]);
        } else {
            echo json_encode([
                'status' => 'erro'
            ]);
        }
        
    } else {
        echo json_encode([
            'status' => 'erro'
        ]);
    }
?>

