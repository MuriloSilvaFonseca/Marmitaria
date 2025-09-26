<?php
session_start();
include("../../../../padrao/header.php");
include("../../../../padrao/conexao.php");
include("../../../../padrao/nav-cliente.php");
include("../select/pedido.php");

?>

<div class="container my-4">
    <?php if (empty($pedidos)) { ?>
        <div class="alert alert-info">Você ainda não possui pedidos.</div>
    <?php } else { ?>
        <?php foreach ($pedidos as $id => $pedido){ ?>
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="mb-0">Pedido #<?= $id ?></h5>
                            <small>Status:
                                <?php 
                                    if ($pedido['status'] == 'Em andamento') {
                                        echo "<span class='badge bg-warning'>";
                                    } elseif ($pedido['status'] == 'Não confirmado') {
                                        echo "<span class='badge bg-secondary'>";
                                    } elseif ($pedido['status'] == 'Negado' || $pedido['status'] == 'Cancelado') {
                                        echo "<span class='badge bg-danger'>";
                                    } elseif ($pedido['status'] == 'Finalizado') {
                                        echo "<span class='badge bg-success'>";
                                    }
                                ?>
    
                                    <?= $pedido['status'] ?>
                                </span>
                            </small>
                        </div>
                        <div class="text-end">
                            <small><?= date('d/m/Y H:i', strtotime($pedido['data_pedido'])) ?></small>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Tipo de Pagamento:</strong> <?= $pedido['tipo_pag'] ?>
                        </div>
                        <div class="col-md-4">
                            <strong>Forma de Entrega:</strong> <?= $pedido['entrega'] ?>
                        </div>
                        <div class="col-md-4">
                            <strong>Data do Pedido:</strong> <?= date('d/m/Y', strtotime($pedido['data_pedido'])) ?>
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
                                <?php foreach ($pedido['produtos'] as $prod){ ?>
                                    <tr>
                                        <td><?= $prod['nome'] ?></td>
                                        <td><?= $prod['qtd'] ?></td>
                                        <td>R$ <?= number_format($prod['valor'], 2, ',', '.') ?></td>
                                        <td>R$ <?= number_format($prod['qtd'] * $prod['valor'], 2, ',', '.') ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>R$ <?= number_format($pedido['total'], 2, ',', '.') ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <?php if ($pedido['status'] == 'Em andamento') {?>

                    <div class="text-end mt-3">
                        <button class="btn btn-success ms-2">Confirmar Recebimento</button>
                    </div>

                    <?php } elseif ($pedido['status'] == 'Negado' || $pedido['status'] == 'Cancelado') { ?>
                        <div class="text-start mt-3">
                            <h5>Motivo</h5>
                            <p><?= $pedido['motivo']?></p>
                        </div>

                    <?php } elseif ($pedido['status'] == 'Não confirmado') { ?>
                        <div class="text-end mt-3">
                            <form action="../update/cancelar.php" method="post">
                                <input type="hidden" name="id_pedido" value="<?=$id?>">
                                <button type="submit" class="btn btn-danger">Cancelar Pedido</button>
                            </form>
                        </div>
                    <?php }?>
                        
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<?php include("../../../../padrao/footer.php"); ?>