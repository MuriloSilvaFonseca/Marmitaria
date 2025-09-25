<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav.php");
    include("../../../../padrao/conexao.php");
    include("../select/naoConf.php");
    include("../select/andamento.php");
    include("../select/negado.php");
    include("../select/finalizado.php");

?>



    <div class="container my-4">
    <!-- MENU DE STATUS -->
    <ul class="nav nav-tabs mb-4 justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#naoConfirmados">Não confirmados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#emAndamento">Em andamento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#finalizados">Finalizados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#negados">Negados</a>
        </li>
    </ul>

    <!-- CONTEÚDO DAS ABAS -->
    <div class="tab-content">
        <!-- ABA NÃO CONFIRMADOS -->
        <div class="tab-pane  show active" id="naoConfirmados">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-3 text-center text-dark">Pedidos não confirmados</h4>
                    
                    <?php if (empty($pedidos)) { ?>
                        <div class="alert alert-info">Você ainda não possui pedidos em andamento</div>
                    <?php } else {
                        foreach ($pedidos as $id => $pedido) { ?>
                        <div class="card shadow-sm mb-3 bg-light">
                            <div class="card-header bg-secondary text-light">
                                <h5 class="mb-0">Pedido #<?= $id ?></h5>
                                
                                <small>Status: <span class="badge bg-light text-dark">Aguardando Confirmação</span></small>
                            </div>

                            <div>

                            </div>

                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4"><strong>Pagamento:</strong> <?= $row['tipo_pag']?> </div>
                                    <div class="col-md-4"><strong>Entrega:</strong> <?= $pedido['entrega'] ?></div>
                                    <div class="col-md-4"><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($pedido['data_pedido'])) ?></div>
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
                                            <?php foreach ($pedido['produtos'] as $prod) { ?>
                                            <tr>
                                                <td><?= $prod['nome'] ?></td>
                                                <td><?= $prod['qtd'] ?></td>
                                                <td>R$ <?= number_format($prod['valor'], 2, ',', '.') ?></td>
                                                <td>R$ <?= number_format($prod['qtd'] * $prod['valor'], 2, ',', '.') ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                                <td><strong>R$ <?= number_format($pedido['total'], 2, ',', '.') ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <form action="../update/statusPed.php" method="post">
                                        <input type="hidden" name="sttMod" value="Negado">
                                        <input type="hidden" name="id_pedido" value="<?= $id ?>">
                                        <button class="btn btn-danger btn-sm">Negar</button>
                                    </form>

                                    <form action="../update/statusPed.php" method="post">
                                        <input type="hidden" name="sttMod" value="Em andamento">
                                        <input type="hidden" name="id_pedido" value="<?= $id ?>">
                                        <button class="btn btn-success btn-sm ms-2">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </div>

        <!-- OUTRAS ABAS -->

        <!-- Em andamento -->
        <div class="tab-pane " id="emAndamento">
            <h4 class="mb-3 text-center text-warning">Pedidos em andamento</h4>
            <?php if (empty($pedsAndamento)) {?>
                <div class="alert alert-info">Você não possui em andamento pedidos</div>

            <?php } else {
                foreach ($pedsAndamento as $idAnd => $pediAndamento) {?>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-warning text-white">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">Pedido #<?= $idAnd ?></h5>
                        <h5>Cliente: <?= $pediAndamento['nome_usuario']?></h5>
                    </div>
                    <small>Status: <span class="badge bg-warning"><?= $pediAndamento['status'] ?></span></small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Pagamento:</strong> <?= $rowAnd['tipo_pag']?></div>
                        <div class="col-md-4"><strong>Entrega:</strong> <?= $pediAndamento['entrega'] ?></div>
                        <div class="col-md-4"><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($pediAndamento['data_pedido'])) ?> </div>
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
                                <?php foreach ($pediAndamento['produtos'] as $prodAnd){ ?>
                                <tr>
                                    <td><?= $prodAnd['nome'] ?></td>
                                    <td><?= $prodAnd['qtd'] ?></td>
                                    <td>R$ <?= number_format($prodAnd['valor'], 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($prodAnd['qtd'] * $prodAnd['valor'], 2, ',', '.') ?></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                            <tfoot>

                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>R$ <?= number_format($pediAndamento['total'], 2, ',', '.') ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-end mt-3">
                        <form action="../update/statusPed.php" method="POST">
                            <input type="hidden" name="sttMod" value="Finalizado">
                            <input type="hidden" name="id_pedido" value="<?= $idAnd ?>">
                            <button type="submit" class="btn btn-success btn-sm ms-2">Finalizar pedido</button>
                        </form>
                    </div>        

                </div>
            </div>
                    <?php }?>
            <?php }?>
        </div>
        
        <!-- Finalizados -->

        <div class="tab-pane" id="finalizados">
            <h4 class="mb-3 text-center text-success">Pedidos Finalizados</h4>
            
            <?php if (empty($pedsFinalizado)) {?>
                <div class="alert alert-info">Você não possui pedidos finalizados</div>

            <?php } else {
                foreach ($pedsFinalizado as $idFin => $pediFinalizado) {?>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">Pedido #<?= $idFin ?></h5>
                        <h5 class="">Cliente: <?= $pediFinalizado['nome_usuario']?></h5>
                    </div>
                    <small>Status: <span class="badge bg-success"><?= $pediFinalizado['status'] ?></span></small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Pagamento:</strong> <?= $rowFin['tipo_pag']?></div>
                        <div class="col-md-4"><strong>Entrega:</strong> <?= $pediFinalizado['entrega'] ?></div>
                        <div class="col-md-4"><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($pediFinalizado['data_pedido'])) ?> </div>
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
                                <?php foreach ($pediFinalizado['produtos'] as $prodFin){ ?>
                                <tr>
                                    <td><?= $prodFin['nome'] ?></td>
                                    <td><?= $prodFin['qtd'] ?></td>
                                    <td>R$ <?= number_format($prodFin['valor'], 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($prodFin['qtd'] * $prodFin['valor'], 2, ',', '.') ?></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                            <tfoot>

                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>R$ <?= number_format($pediFinalizado['total'], 2, ',', '.') ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
                    <?php }?>
            <?php }?> 
        </div>

        <!-- Negados -->

        <div class="tab-pane " id="negados">
            <h4 class="mb-3 text-center text-danger">Pedidos negados</h4>
            
            <?php if (empty($pedsNegado)) {?>
                <div class="alert alert-info">Não possui pedidos negados</div>

            <?php } else {
                foreach ($pedsNegado as $idNeg => $pediNegado) {?>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-danger text-white">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">Pedido #<?= $idNeg ?></h5>
                        <h5 class="">Cliente: <?= $pediNegado['nome_usuario']?></h5>
                    </div>
                    <small>Status: <span class="badge bg-danger"><?= $pediNegado['status'] ?></span></small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Pagamento:</strong> <?= $rowNeg['tipo_pag']?></div>
                        <div class="col-md-4"><strong>Entrega:</strong> <?= $pediNegado['entrega'] ?></div>
                        <div class="col-md-4"><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($pediNegado['data_pedido'])) ?> </div>
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
                                <?php foreach ($pediNegado['produtos'] as $prodNeg){ ?>
                                <tr>
                                    <td><?= $prodNeg['nome'] ?></td>
                                    <td><?= $prodNeg['qtd'] ?></td>
                                    <td>R$ <?= number_format($prodNeg['valor'], 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($prodNeg['qtd'] * $prodNeg['valor'], 2, ',', '.') ?></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                            <tfoot>

                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>R$ <?= number_format($pediNegado['total'], 2, ',', '.') ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-start mt-3">
                        <h5>Motivo</h5>
                        <p><?= $pediNegado['motivo']?></p>
                    </div>     

                </div>
            </div>
                    <?php }?>
            <?php }?> 
        </div>
    </div>
</div>

<?php 
    include("../../../../padrao/footer.php");
?>