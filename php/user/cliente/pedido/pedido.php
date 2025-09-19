<?php
    $entrega = $_REQUEST['entrega'];
    $pagamento = $_REQUEST['pagamento'];

    if ($pagamento == '' || $entrega == '') {
        $id_prod_carrinho = $_REQUEST["id_prod_carrinho"];
        $nome_prod_carrinho = $_REQUEST["nome_prod_carrinho"];
        $qtd_prod = $_REQUEST["qtd_prod"];
        $vlr_uni = $_REQUEST["vlr_uni"];
        $total = $_REQUEST["total"];    

        
?> 
    <form action="carrinho.php" method="post" id="retornoCarrinho">
        <input type="hidden" name="id_produto_carrinho[]" value="<?= $id_prod_carrinho?>">
        <input type="hidden" name="nome_prod_carrinho[]" value="<?= $nome_prod_carrinho?>">
        <input type="hidden" name="qtd_prod[]" value="<?= $qtd_prod?>">
        <input type="hidden" name="vlr_uni[]" value="<?= $vlr_uni?>">
        <input type="hidden" name="total" value="<?= $total?>">    
    </form>

    <script>
        window.onload = function() {
            document.getElementById("retornoCarrinho").submit();
        }
    </script>
<?php
    }
?>