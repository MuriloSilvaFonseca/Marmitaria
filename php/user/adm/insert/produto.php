<?php 
    include("../../../../padrao/conexao.php");

    if  

    $nome_produto = $_REQUEST['nome_produto'];
    $valor_prod = $_REQUEST['valor_prod'];
    $categoria = $_REQUEST['categoria'];
    $status = $_REQUEST['status'];
    $qtd_est = $_REQUEST['qtd_est'];
    $dt_aquisicao = $_REQUEST['dt_aquisicao'];
    $dt_venc = $_REQUEST['dt_venc'];

    var_dump($_REQUEST);
    exit;

    $sql = "INSERT INTO produto (
                `id_produto`,
                `nome_produto`,
                `valor_prod`,
                `categoria`,
                `status`,
                `qtd_est`,
                `dt_aquisicao`,
                `dt_venc`
            ) VALUES (default, '{$nome_produto}', '{$valor_prod}', '{$categoria}', '{$status}', '{$qtd_est}', '{$dt_aquisicao}', '{$dt_venc}')";
?>