<?php 
    $sql = "SELECT id_produto, nome_produto, valor_prod, categoria, status, qtd_est, dt_aquisicao, dt_venc FROM produto";

    $res = $conn -> query($sql);

    $lista = $res -> fetchAll(PDO::FETCH_ASSOC);

    $id_produto = $res -> fetch();

    $row = $res -> rowCount();
?>