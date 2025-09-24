<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav.php");
    include("../../../../padrao/conexao.php");
    include("../select/naoConf.php");
?>

<div class="container my-4">
    
    <div class="row">
        <!-- Coluna ESQUERDA - Pedidos não confirmados -->
        <div class="col-md-6 mb-4">
            <h4 class="mb-3 text-center text-danger">Pedidos não confirmados</h4>

            <!-- CARD DE UM PEDIDO -->

             <?php if (empty($pedidos)) {?>
                <div class="alert alert-info">Você ainda não possui pedidos</div>

            <?php } else {?>
                <?php foreach ($pedidos as $id => $pedido) {?>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Pedido #<?= $id ?></h5>
                    <small>Status: <span class="badge bg-warning text-dark">Aguardando Confirmação</span></small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Pagamento:</strong> <?= $row['tipo_pag']?> </div>
                        <div class="col-md-4"><strong>Entrega:</strong> <?= $pedido['entrega'] ?></div>
                        <div class="col-md-4"><strong>Data:</strong> <?= date('d/m/Y', strtotime($pedido['data_pedido'])) ?></div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Qtd</th>
                                    <th>Unit.</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pedido['produtos'] as $prod){ ?>
                                <tr>
                                    <td><?= $prod['nome'] ?></td>
                                    <td><?= $prod['qtd'] ?></td>
                                    <td>R$ <?= number_format($prod['valor'], 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($prod['qtd'] * $prod['valor'], 2, ',', '.') ?></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>R$ <?= number_format($pedido['total'], 2, ',', '.') ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-end mt-3">
                        <button class="btn btn-danger btn-sm">Cancelar Pedido</button>
                        <button class="btn btn-success btn-sm ms-2">Confirmar Pedido</button>
                    </div>
                </div>
            </div>
                <?php }?>
            <?php }?>
            
            <!-- /CARD -->

            <div class="card shadow-sm mb-3">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Pedido #123</h5>
                    <small>Status: <span class="badge bg-warning text-dark">Aguardando Confirmação</span></small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Pagamento:</strong> Boleto</div>
                        <div class="col-md-4"><strong>Entrega:</strong> Motoboy</div>
                        <div class="col-md-4"><strong>Data:</strong> 20/09/2025</div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Qtd</th>
                                    <th>Unit.</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Produto A</td>
                                    <td>2</td>
                                    <td>R$ 50,00</td>
                                    <td>R$ 100,00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>R$ 100,00</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-end mt-3">
                        <button class="btn btn-danger btn-sm">Cancelar Pedido</button>
                        <button class="btn btn-success btn-sm ms-2">Confirmar Pedido</button>
                    </div>
                </div>
            </div>

        </div>



        <!-- Coluna DIREITA - Pedidos em andamento -->


        <div class="col-md-6 mb-4">
            <h4 class="mb-3 text-center text-primary">Pedidos em andamento</h4>

            <!-- CARD DE UM PEDIDO -->
             <?php if (empty($pedidos)) {?>
                <div class="alert alert-info">Você ainda não possui pedidos</div>

            <?php } else {?>
                <?php foreach ($pedidos as $id => $pedido) {?>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Pedido #<?= $id ?></h5>
                    <small>Status: <span class="badge bg-primary">Em Andamento</span></small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Pagamento:</strong> <?= $row['tipo_pag']?></div>
                        <div class="col-md-4"><strong>Entrega:</strong> <?= $pedido['entrega'] ?></div>
                        <div class="col-md-4"><strong>Data:</strong> <?= date('d/m/Y', strtotime($pedido['data_pedido'])) ?></div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Qtd</th>
                                    <th>Unit.</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pedido['produtos'] as $prod){ ?>
                                <tr>
                                    <td><?= $prod['nome'] ?></td>
                                    <td><?= $prod['qtd'] ?></td>
                                    <td>R$ <?= number_format($prod['valor'], 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($prod['qtd'] * $prod['valor'], 2, ',', '.') ?></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>R$ <?= number_format($pedido['total'], 2, ',', '.') ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php }?>
            <?php }?>

                    <div class="text-end mt-3">
                        <button class="btn btn-success btn-sm">Confirmar Recebimento</button>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Pedido #456</h5>
                    <small>Status: <span class="badge bg-primary">Em Andamento</span></small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Pagamento:</strong> Cartão</div>
                        <div class="col-md-4"><strong>Entrega:</strong> Retirada</div>
                        <div class="col-md-4"><strong>Data:</strong> 18/09/2025</div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Qtd</th>
                                    <th>Unit.</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Produto B</td>
                                    <td>1</td>
                                    <td>R$ 80,00</td>
                                    <td>R$ 80,00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>R$ 80,00</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-end mt-3">
                        <button class="btn btn-success btn-sm">Confirmar Recebimento</button>
                    </div>
                </div>
            </div>

            <!-- /CARD -->
        </div>
    </div>
</div>
</

<?php 
    include("../../../../padrao/footer.php");
?>