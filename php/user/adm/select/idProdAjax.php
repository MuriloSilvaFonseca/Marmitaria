<?php 
    include("../../../../padrao/conexao.php");

    $sqlAjax = "SELECT id_produto FROM produto ORDER BY id_produto DESC LIMIT 1";
    $resAjax = $conn -> query($sqlAjax);
    $idAjax = $resAjax -> fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "sucesso",
        "idProd" => $idAjax,
        "statusProd" => "Disponível"
    ]);
?>