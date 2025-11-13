<?php 
include("../../../../padrao/conexao.php");

    $id_produto_edit = $_REQUEST['id_prod_editar'];
    $nome_produto_edit = $_REQUEST["nome_produto_edit"];
    $descricao_edit = $_REQUEST["descricao_edit"];
    $valor_prod_edit = $_REQUEST["valor_prod_edit"];
    $categoria_edit = $_REQUEST["categoria_edit"];
    $qtd_est_edit = $_REQUEST["qtd_est_edit"];
    $dt_aquisicao_edit = $_REQUEST["dt_aquisicao_edit"];
    $dt_venc_edit = $_REQUEST["dt_venc_edit"];

    $valor_prod_edit = str_replace(',', '.', $valor_prod_edit);

    $sql = "UPDATE produto
        SET nome_produto = '$nome_produto_edit', descricao = '$descricao_edit', valor_prod = '$valor_prod_edit', categoria = '$categoria_edit', qtd_est = '$qtd_est_edit', dt_aquisicao = '$dt_aquisicao_edit', dt_venc = '$dt_venc_edit'
        WHERE id_produto = '$id_produto_edit'";

    $res = $conn -> query($sql);

    if ($res == true) {
        $valor_format = number_format($valor_prod_edit, 2, ',', '.');
        $data_aqui_format = date("d/m/Y", strtotime($dt_aquisicao_edit));
        $data_venc_format = date("d/m/Y", strtotime($dt_venc_edit));


        echo json_encode([
            "status" => "sucesso",
            "valor" => $valor_format,
            "data_aqui_format" => $data_aqui_format,
            "data_venc_format" => $data_venc_format
        ]);
    } else {
        echo json_encode([
            "status" => "erro"
        ]);
    }
?>