<?php
    $totclientes = "SELECT id_usuario FROM usuario WHERE status = 'Ativo' AND tipo_usuario = 'Cliente'";
    $resTotclientes = $conn -> query($totclientes);
    $contTotclientes = $resTotclientes -> rowCount();


    date_default_timezone_set('America/Sao_Paulo');
    $refDataCom = date('Y-m-d') . ' 00:00:00';
    $refDataFin = date('Y-m-d') . ' 23:59:59';

    $rendimentoDiario = "SELECT total FROM pedido WHERE data_final BETWEEN '$refDataCom' AND '$refDataFin';";
    $resRendDiario = $conn -> query($rendimentoDiario);
    $totDiario = $resRendDiario -> fetchAll(PDO::FETCH_ASSOC);

    $totalDiario = 0;
    foreach ($totDiario as $totUni) {
        $totalDiario = $totalDiario + $totUni['total'];
    }

    
    $contPedDiario = $resRendDiario -> rowCount();
    if ($contPedDiario != 0) {
        $ticketDiario = $totalDiario / $contPedDiario;
    }
    


    $pedAnd = "SELECT * FROM pedido WHERE status = 'Em andamento'";
    $resPedAnd = $conn -> query($pedAnd);
    $contPedAnd = $resPedAnd -> rowCount();


    $pedPen = "SELECT * FROM pedido WHERE status = 'Não confirmado'";
    $resPedPen = $conn -> query($pedPen);
    $contPedPen = $resPedPen -> rowCount();


    $totPed = "SELECT * FROM pedido WHERE status = 'Em andamento' OR status = 'Finalizado'";
    $resTotPed = $conn -> query($totPed);
    $contTotPed = $resTotPed -> rowCount();



?>