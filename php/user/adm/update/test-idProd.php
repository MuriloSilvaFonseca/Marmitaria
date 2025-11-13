<?php 
    include("../../../../padrao/conexao.php");

    $id_produto = $_REQUEST['id_prod_editar'];
          
        if (isset($id_produto)) {
            $sql = "SELECT nome_produto, descricao, valor_prod, categoria, qtd_est, dt_aquisicao, dt_venc FROM produto WHERE id_produto = '$id_produto'";

            $res = $conn -> query($sql);

            $preenche = $res -> fetch(PDO::FETCH_ASSOC);

            echo json_encode([
                "status" => "sucesso",
                "id_prod" => $id_produto,
                "nome_produto" => $preenche['nome_produto'],
                "descricao" => $preenche['descricao'],
                "valor_prod" => $preenche['valor_prod'],
                "categoria" => $preenche['categoria'],
                "qtd_est" => $preenche['qtd_est'],
                "dt_aquisicao" => $preenche['dt_aquisicao'],
                "dt_venc" => $preenche['dt_venc']
            ]);
        }
?>