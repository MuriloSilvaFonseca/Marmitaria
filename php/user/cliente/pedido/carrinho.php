<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav-cliente.php");

    $id_prod_carrinho = $_REQUEST['id_produto_carrinho'];
    $nome_prod_carrinho = $_REQUEST['nome_prod_carrinho'];
    $qtd_prod = $_REQUEST['qtd_prod'];
    $vlr_uni = $_REQUEST['vlr_uni'];
    $total = $_REQUEST['total'];

    $pedido = [];

    for ($i = 0; $i < count($id_prod_carrinho); $i++) {
        $pedido[] = [
            "id_prod_carrinho" => $id_prod_carrinho[$i],
            "nome_prod_carrinho" => $nome_prod_carrinho[$i],
            "vlr_uni" => $vlr_uni[$i],
            "qtd_prod" => $qtd_prod[$i],
            "subTotal" => $qtd_prod[$i] * $vlr_uni[$i]
        ];
    }

    $sql = "SELECT nome_produto FROM produto";
?>


<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Carrinho de Compras</h4>
        </div>
        <div class="card-body">

            <div class="table-responsive mb-4">
                <table class="table table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor Unitário</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            foreach ($pedido as $info) {
                        ?>

                            <tr>
                                <td><?=$info['nome_prod_carrinho']?></td>
                                <td><?=$info['qtd_prod']?></td>
                                <td>R$ <?=$info['vlr_uni']?></td>
                                <td>R$ <?=$info['subTotal']?></td>
                            </tr>

                        <?php       
                            }
                        ?>
    
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Total:</td>
                            <td class="fw-bold">R$ <?=$total?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mb-4">
                <label for="pagamento" class="form-label fw-bold">Método de Pagamento</label>
                <select id="pagamento" class="form-select">
                    <option value="">Selecione</option>
                    <option value="dinheiro">Dinheiro</option>
                    <option value="cartao">Cartão de Crédito</option>
                    <option value="pix">PIX</option>
                </select>
            </div>

            <button class="btn btn-success w-100" onclick="confirmarPedido()">Confirmar Pedido</button>
        </div>
    </div>
</div>

<script>
    function confirmarPedido() {
        const pagamento = document.getElementById('pagamento').value;
        if (!pagamento) {
            alert('Por favor, selecione um método de pagamento.');
            return;
        }
        alert('Pedido confirmado!\nMétodo de pagamento: ' + pagamento);
    }
</script>

<?php 
    include("../../../../padrao/footer.php");
?>