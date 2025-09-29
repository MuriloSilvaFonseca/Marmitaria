<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav.php");
    include("../../../../padrao/conexao.php");
    include("../select/produto.php");
?>

    <div class="container py-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Listagem de Produtos</h4>
        <button class="btn btn-light btn-sm" onclick="window.location.href='cadProduto.php'">Cadastrar Produto</button>
      </div>
      <?php 
        if ($row > 0) {
      ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="table-primary">
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor (R$)</th>
                <th>Categoria</th>
                <th>Quantidade</th>
                <th>Data de Aquisição</th>
                <th>Data de Vencimento</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($lista as $user) { ?>
              <tr>
                <td><?= $user['id_produto'] ?></td>
                <td><?= $user['nome_produto'] ?></td>
                <td>R$ <?=number_format($user['valor_prod'], 2, ',', '.')?> </td> 
                <td><?= $user['categoria'] ?></td>
                <td><?= $user['qtd_est'] ?></td>
                <td><?= $dataBR = date("d/m/Y", strtotime($user['dt_aquisicao'])) ?></td>
                <td><?= $dataBR = date("d/m/Y", strtotime($user['dt_venc'])) ?></td>
                <td><?= $user['status'] ?></td>

                <td>
                  <div class="d-flex flex-wrap gap-1">

                    <form action="editarProd.php" method="post" class="mb-0">
                      <input type="hidden" name="id_prod_editar" value="<?= $user['id_produto']; ?>">
                      <button type="submit" class="btn btn-sm btn-success">✏️</button>
                    </form>

                    <form action="../update/statusProd.php" method="post" class="mb-0">
                      <input type="hidden" name="id_produto" value="<?= $user['id_produto']; ?>">
                      <input type="hidden" name="condicao_status" value="<?= $user['status']; ?>">
                      <button type="submit" class="btn btn-sm btn-warning">
                        <?php 
                          if ($user['status'] == 'Disponível') {
                            echo '⛔';
                          } else {
                            echo '✅';
                          }
                        ?>
                      </button>
                    </form>
                  </div>

                </td>
              </tr>

              <tr>
                <td colspan="9" style="padding-bottom: 20px;">
                  <b>Descrição:</b><br>
                  <?= $user['descricao'] ?>
                </td>
              </tr>
              <?php 
              }} else {
                  echo "<p class='p-3 mb-0'><b>Não tem clientes cadastrados</b></p>";
                }
                ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer text-muted text-center">
        
      </div>
    </div>
  </div>


<?php 
    include('../../../../padrao/footer.php');
?>