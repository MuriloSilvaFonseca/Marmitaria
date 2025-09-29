<?php 
include("../../../../padrao/conexao.php");

    $id_produto = $_REQUEST['id_prod'];

    $nome_produto = $_REQUEST["nome_produto"];
    $descricao = $_REQUEST["descricao"];
    $valor_prod = $_REQUEST["valor_prod"];
    $categoria = $_REQUEST["categoria"];
    $qtd_est = $_REQUEST["qtd_est"];
    $dt_aquisicao = $_REQUEST["dt_aquisicao"];
    $dt_venc = $_REQUEST["dt_venc"];

    $sql = "UPDATE produto
            SET nome_produto = '$nome_produto', descricao = '$descricao', valor_prod = '$valor_prod', categoria = '$categoria', qtd_est = '$qtd_est', dt_aquisicao = '$dt_aquisicao', dt_venc = '$dt_venc'
            WHERE id_produto = '$id_produto'";

    $res = $conn -> query($sql);

    if ($res == true) {

        echo "<script>alert('Editado com sucesso');</script>";

        echo "<script>location.href='../produto/listProd.php';</script>";
        
    } else {
        echo "alert('Não foi possível Editar')";

        echo "<script>location.href='../produto/editarProd.php';</script>";
    }
?>
?>