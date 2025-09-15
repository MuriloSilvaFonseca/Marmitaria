<?php 
    include("../../../../padrao/conexao.php");

        $nome_produto = $_REQUEST['nome_produto'];
        $descricao = $_REQUEST['descricao'];
        $valor_prod = $_REQUEST['valor_prod'];
        $valor_prod = str_replace(',', '.', $valor_prod);
        $categoria = $_REQUEST['categoria'];
        $status = $_REQUEST['status'];
        $qtd_est = $_REQUEST['qtd_est'];
        $dt_aquisicao = $_REQUEST['dt_aquisicao'];
        $dt_venc = $_REQUEST['dt_venc'];

    if ($dt_aquisicao <= $dt_venc) {
        $sql = "INSERT INTO produto (
                    `id_produto`,
                    `nome_produto`,
                    `descricao`,
                    `valor_prod`,
                    `categoria`,
                    `status`,
                    `qtd_est`,
                    `dt_aquisicao`,
                    `dt_venc`
                ) VALUES (default, '{$nome_produto}', '{$descricao}' ,'{$valor_prod}', '{$categoria}', '{$status}', '{$qtd_est}', '{$dt_aquisicao}', '{$dt_venc}')";
            
        $res = $conn -> query($sql);

        if ($res == true) {
            echo "<script>alert('Cadastrado com sucesso');</script>";

            echo "<script>location.href='../produto/listProd.php';</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar');</script>";

            echo "<script>location.href='../produto/cadProduto.php';</script>";
        }

    } else {
        echo "<script>alert('Não foi possível cadastrar');</script>";

        echo "<script>location.href='../produto/cadProduto.php';</script>";
    }

?>
   

        