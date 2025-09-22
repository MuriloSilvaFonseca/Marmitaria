<?php
    session_start();
    include("../../../../padrao/header.php");
    include("../../../../padrao/conexao.php");
    include("../select/pedido.php");
?>

<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detalhes do Pedido #1</h5>
            <small>Status: <span class="badge bg-warning">Em andamento</span></small>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Tipo de Pagamento:</strong> Cartão de Crédito
                </div>
                <div class="col-md-4">
                    <strong>Forma de Entrega:</strong> Entrega em domicílio
                </div>
                <div class="col-md-4">
                    <strong>Data do Pedido:</strong> 22/09/2025
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor Unitário</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Marmita M</td>
                            <td>2</td>
                            <td>R$ 20,00</td>
                            <td>R$ 40,00</td>
                        </tr>
                        <tr>
                            <td>Marmita G</td>
                            <td>1</td>
                            <td>R$ 30,00</td>
                            <td>R$ 30,00</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td><strong>R$ 70,00</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-3">
                <button class="btn btn-danger">Cancelar Pedido</button>
                <button class="btn btn-success">Confirmar Recebimento</button>
            </div>
        </div>
    </div>
</div>

<?php
    include("../../../../padrao/footer.php");
?>