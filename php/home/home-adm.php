<?php
session_start();

include('../../padrao/header.php');

if (isset($_SESSION["email_login"])) {
} else {
    echo "<script>location.href='../../index.php';</script>";
    exit;
}

$logado = $_SESSION["email_login"];

include("../../padrao/conexao.php");
include("../../padrao/nav.php");
include("../user/adm/select/naoConf.php");
include("../user/adm/select/andamento.php");
include("../user/adm/select/dashboard.php")

?>


<div class="dashboard-header bg-dark text-white py-4 shadow-sm mb-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="mb-2 fw-bold">
                    <i class="fas fa-utensils me-3 text-warning"></i>
                    Dashboard Marmitaria
                </h1>
                <p class="mb-0 text-light opacity-75">Acompanhe seu negócio em tempo real</p>
            </div>
        </div>
    </div>
</div>

<!-- DASHBOARD -->
<div class="container">
    <div class="row g-4">
        <!-- Clientes Ativos -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold text-primary">Clientes Ativos</h5>
                            <h2 class="fw-bold text-dark" id="clientesAtivos"><?= $contTotclientes?></h2>
                            <small class="text-muted">Este mês</small>
                        </div>
                        <div class="display-4 text-primary">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rendimento Atual -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold text-success">Rendimento Atual</h5>
                            <h2 class="fw-bold" id="rendimentoAtual">R$ <?= number_format($totalDiario, 2, ',', '.')?></h2>
                            <small class="text-muted">Hoje</small>
                        </div>
                        <div class="display-4 text-success">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pedidos em Andamento -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold text-warning">Pedidos em Andamento</h5>
                            <h2 class="fw-bold text-dark" id="pedidosAndamento"><?= $contPedAnd?></h2>
                            <small class="text-muted">Sendo preparados</small>
                        </div>
                        <div class="display-4 text-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pedidos Não Confirmados -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold text-danger">Não Confirmados</h5>
                            <h2 class="fw-bold text-dark" id="pedidosNaoConfirmados"><?= $contPedPen?></h2>
                            <small class="text-muted">Aguardando confirmação</small>
                        </div>
                        <div class="display-4 text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumo -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4 text-dark">
                        <i class="fas fa-chart-line me-2 text-info"></i>
                        Resumo do Dia
                    </h4>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h6 class="text-muted">Total de Pedidos</h6>
                            <h3 class="fw-bold text-primary" id="totalPedidos"><?= $contTotPed?></h3>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-muted">Ticket Médio</h6>
                            <h3 class="fw-bold text-success" id="ticketMedio">R$ 
                                <?php 
                                    if (isset($ticketDiario)) {
                                        echo number_format($ticketDiario, 2, ',', '.');
                                    } else {
                                        echo "0,00";
                                    }
<<<<<<< HEAD
                                    
=======
>>>>>>> b2cc565e3cf82f61a41678b2ef31a83c29800194
                                ?>
                            </h3>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-muted">Prato Mais Vendido</h6>
                            <h3 class="fw-bold text-warning">Frango Grelhado</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container my-4">

        <div class="row"> 

            <!-- Coluna ESQUERDA - Pedidos não confirmados -->
            <div class="col-md-6 mb-4">
                <h4 class="mb-3 text-center text-dark">Pedidos não confirmados</h4>
                 <!-- CARD DE UM PEDIDO --> 
                  <?php if (empty($pedidos)) { ?> 
                    <div class="alert alert-info">
                        Não existe pedidos aguardando confirmação
                    </div> 

                    <?php 
                        } else {
                            foreach ($pedidos as $id => $pedido) { 
                    ?> 
                                <div class="card shadow-sm mb-3 bg-light">
                                    <div class="card-header bg-secondary text-light">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-0">Pedido #<?= $id ?></h5>
                                            <h5>Cliente: <?= $pedido['nome_usuario']?></h5>
                                        </div>  
                                            <small>Status: <span class="badge bg-light text-dark">Aguardando Confirmação</span></small>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-4"><strong>Pagamento:</strong> <?= $row['tipo_pag'] ?> </div>
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

                                        <div class="text-end mt-3 d-flex justify-content-end">
                                            <form action="../user/adm/update/statusPed.php" method="post"> 
                                                <input type="hidden" name="sttMod" value="Negado"> 
                                                <input type="hidden" name="id_pedido" value="<?= $id ?>"> 
                                                <button class="btn btn-danger btn-sm">Negar Pedido</button> 
                                            </form>

                                            <form action="../user/adm/update/statusPed.php" method="post"> 
                                                <input type="hidden" name="sttMod" value="Em andamento">
                                                <input type="hidden" name="saida" value="home-adm">  
                                                <input type="hidden" name="id_pedido" value="<?= $id ?>"> 
                                                <button class="btn btn-success btn-sm ms-2">Confirmar Pedido</button> 
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            <?php } ?> 
                        <?php } ?>
            </div>

            <!-- Coluna DIREITA - Pedidos em andamento -->
            <div class="col-md-6 mb-4">
                <h4 class="mb-3 text-center text-warning">Pedidos em andamento</h4>
                    <!-- CARD DE UM PEDIDO --> 
                     <?php if (empty($pedsAndamento)) { ?> 
                        <div class="alert alert-info">Não existe pedidos em andamento</div> 
                        <?php } else {
                            foreach ($pedsAndamento as $idAnd => $pediAndamento) { ?> 
                            <div class="card shadow-sm mb-3">
                                <div class="card-header bg-warning text-white">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0">Pedido #<?= $idAnd ?></h5>
                                        <h5>Cliente: <?= $pediAndamento['nome_usuario']?></h5>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <small>Status: <span class="badge bg-warning"><?= $pediAndamento['status'] ?></span></small>
                                        <small>Iniciado em: <?= date('d/m/Y H:i', strtotime($pediAndamento['data_comeco'])) ?></small>
                                    </div>
                                </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4"><strong>Pagamento:</strong> <?= $rowAnd['tipo_pag'] ?></div>
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
                                            <?php foreach ($pediAndamento['produtos'] as $prodAnd) { ?> 
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
                                    <form action="../user/adm/update/statusPed.php" method="post">
                                        <input type="hidden" name="sttMod" value="Finalizado"> 
                                        <input type="hidden" name="id_pedido" value="<?= $idAnd ?>">
                                        <button class="btn btn-success btn-sm ms-2">Finalizar pedido</button> 
                                    </form>
                                </div>
                            </div>
                        </div> 
                    <?php } ?> 
                <?php } ?>
            </div>
        </div>
    </div>

    <?php
    include('../../padrao/footer.php')

    ?>