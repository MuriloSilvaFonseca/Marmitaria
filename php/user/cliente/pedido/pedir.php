<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav-cliente.php");
    include("../../../../padrao/conexao.php");
    include("../select/carrinho.php")
?>

<h1>Pedido</h1>

<div class="container py-5">
  <h2 class="mb-4 text-center">Realizar Pedido</h2>

  <div class="row">
    <div class="col-md-8">
      <div class="row g-3">
        <?php 
            if ($row > 0) {           
                foreach ($lista as $prod) {
        ?> 
                    <div class="col-12 col-md-6">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= $prod['nome_produto']?></h5>
                                <p class="card-text flex-grow-1"><?= $prod['descricao']?>
                             
                                <p class="mb-0 p-2"><?= $prod['categoria']?></p>

                                <p class="card-text"><strong>R$<?= $prod['valor_prod']?></strong></p>
                                

                                <div class="input-group mb-2">
                                    <span class="input-group-text">Qtd</span>
                                    <input type="number" class="form-control" value="1" min="1">
                                </div>
                                <button class="btn btn-primary w-100">Adicionar ao Carrinho</button>
                            </div>
                        </div>
                    </div>
        <?php 
                }
            } else {
                echo "<p class='p-3'>Nenhum produto cadastrado</p>";
            }
        ?>

        <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Resumo do Pedido</h5>
            </div>
            <div class="card-body">
                <ul class="list-group mb-3" id="carrinho">
                    <li class="list-group-item text-center text-muted">Nenhum produto adicionado</li>
                </ul>
                <p class="text-end"><strong>Total: R$ <span id="total">0,00</span></strong></p>
                <button class="btn btn-success w-100">Finalizar Pedido</button>
            </div>
        </div>
        </div>
  </div>
</div>

<?php 
    include("../../../../padrao/footer.php");
?>