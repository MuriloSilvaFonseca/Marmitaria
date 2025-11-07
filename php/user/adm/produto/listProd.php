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
      <button class="btn btn-light btn-sm" id="cadProd">Cadastrar Produto</button>
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
                  <td>R$ <?= number_format($user['valor_prod'], 2, ',', '.') ?> </td>
                  <td><?= $user['categoria'] ?></td>
                  <td><?= $user['qtd_est'] ?></td>
                  <td><?= $dataBR = date("d/m/Y", strtotime($user['dt_aquisicao'])) ?></td>
                  <td><?= $dataBR = date("d/m/Y", strtotime($user['dt_venc'])) ?></td>
                  <td id="status-produto-<?= $user['id_produto'] ?>"><?= $user['status'] ?></td>

                  <td>
                    <div class="d-flex flex-wrap gap-1">

                      <form action="editarProd.php" method="post" class="mb-0">
                        <input type="hidden" name="id_prod_editar" value="<?= $user['id_produto']; ?>">
                        <button type="submit" class="btn btn-sm btn-success">✏️</button>
                      </form>

                      <div class="mb-0">
                        <input type="hidden" name="id_produto" value="<?= $user['id_produto']; ?>">
                        <input type="hidden" name="condicao_status" value="<?= $user['status']; ?>">
                        <button type="submit" class="btn btn-sm btn-warning btnMudaProduto">
                          <?php
                          if ($user['status'] == 'Disponível') {
                            echo '⛔';
                          } else {
                            echo '✅';
                          }
                          ?>
                        </button>
                      </div>
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
              }
            } else {
              echo "<p class='p-3 mb-0'><b>Não tem clientes cadastrados</b></p>";
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>

<!-- MODAL  -->

<div class="modal fade" id="modalCadastroProd" aria-labelledby="modalMotivoLabel" aria-hidden="true">
  <div class="modal-dialog modal-custom">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMotivoLabel">Cadastro de Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nome do produto</label>
            <input type="text" name="nome_produto" id="nome_produto" class="form-control" placeholder="Marmita P" required>
          </div>

          <div class="mb-3">
              <label for="descricao" class="form-label">Descrição</label>
              <textarea id="descricao" name="descricao" id="descricao" class="form-control" rows="5" placeholder="Digite a descrição..." required></textarea>
          </div>

          <div class="mb-3">
              <label class="form-label">Valor (R$)</label>
              <input type="text" name="valor_prod" id="valor_prod" class="form-control" id='valor' placeholder="19,99" required>
          </div>

          <div class="mb-3">
              <label for="Categoria" class="form-label">Categoria</label>
              <select class="form-select" id="categoria" name="categoria" required>
                  <option selected value="Comum">Comum</option>
                  <option value="Fitness">Fitness</option>
                  <option value="LowCarb">LowCarb</option>
                  <option value="Vegetariano">Vegetariano</option>
                  <option value="Vegano">Vegano</option>
              </select>
          </div>

          <div class="mb-3">
              <label class="form-label">Quantidade</label>
              <input type="number" name="qtd_est" id="qtd_est" class="form-control" placeholder="5" required>
          </div>

          <div class="mb-3">
              <label class="form-label">Data de Aquisição</label>
              <input type="date" name="dt_aquisicao" id="dt_aquisicao" class="form-control" placeholder="12/06/2025" required>
          </div>

          <div class="mb-3">
              <label class="form-label">Data de Vencimento</label>
              <input type="date" name="dt_venc" id="dt_venc" class="form-control" placeholder="23/07/2025">
          </div>

          <input type="hidden" name="status" id="status" value="Disponível">
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

        <button type="button" class="btn btn-primary" id="enviarCadastro-btn">Salvar</button>
      </div>

    </div>
  </div>
</div>


<?php
include('../../../../padrao/footer.php');
?>