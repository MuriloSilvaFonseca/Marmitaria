<?php 
    include("../../../../padrao/conexao.php");

    $id_produto = $_REQUEST['id_prod_editar'];
          
        if (isset($id_produto)) {
            $sql = "SELECT nome_produto, descricao, valor_prod, categoria, qtd_est, dt_aquisicao, dt_venc FROM produto WHERE id_produto = '$id_produto'";

            $res = $conn -> query($sql);

            $preenche = $res -> fetch(PDO::FETCH_ASSOC);
        }
?>