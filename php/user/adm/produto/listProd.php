<?php
include("../../../../padrao/header.php");
include("../../../../padrao/nav.php");
include("../../../../padrao/conexao.php");
include("../select/produto.php");
include("/Marmitaria/php/user/adm/update/test-idProd.php");

?>

<div class="container py-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">Listagem de Produtos</h4>
      <button class="btn btn-light btn-sm" id="cadProd">Cadastrar Produto</button>
    </div>
    <div class="container my-4">
      <div class="row g-4 conj_card_prod">
        <?php
        if ($row > 0) {
        ?>
          <?php
          foreach ($lista as $user) { ?>

            <!-- Card 1 -->
            <div class="col-12 col-md-6 card_produto">
              <div class="card shadow border-0 h-100">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <small class="text-muted">ID: <strong><?= $user['id_produto'] ?></strong></small>
                      <h5 class="card-title mb-1 mt-1"><?= $user['nome_produto'] ?></h5>
                      <p class="text-muted mb-2">Categoria: <span class="fw-semibold"><?= $user['categoria'] ?></span></p>
                    </div>

                    <?php 
                      if($user['status'] == 'Disponível') {
                    ?>
                      <span class="badge bg-success" id="status-produto-<?= $user['id_produto'] ?>"><?= $user['status'] ?></span>
                    <?php 
                      } else {
                    ?>
                      <span class="badge bg-warning" id="status-produto-<?= $user['id_produto'] ?>"><?= $user['status'] ?></span>
                    <?php
                      }
                    ?>
                      
                    
                    
                  </div>

                  <ul class="list-unstyled mb-3">
                    <li><strong>Valor:</strong> <?= number_format($user['valor_prod'], 2, ',', '.') ?></li>
                    <li><strong>Quantidade:</strong> <?= $user['qtd_est'] ?></li>
                    <li><strong>Data de Aquisição:</strong> <?= $dataBR = date("d/m/Y", strtotime($user['dt_aquisicao'])) ?></li>
                    <li><strong>Data de Vencimento:</strong> <?= $dataBR = date("d/m/Y", strtotime($user['dt_venc'])) ?></li>
                  </ul>

                  <p class="mb-3">
                    <strong>Descrição:</strong><br>
                    <?= $user['descricao'] ?>
                  </p>

                  <div class="d-flex gap-2">

                    
                      <input type="hidden" name="id_prod_editar" value="<?= $user['id_produto']; ?>">
                      <button type="submit" class="btn btn-sm btn-success editarBtn">✏️</button>
                    
                    
                    <div class="container_remover">
                      <input type="hidden" name="id_prod_remover" id="id_prod_remover" value="<?= $user['id_produto']; ?>">
                      <button class="btn btn-danger btn-sm removerBtn">🗑️</button>
                    </div>

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
              </div>
            </div>
        <?php
          }
        } else {
          echo "<p class='p-3 mb-0'><b>Não tem produtos cadastrados</b></p>";
        }
        ?>
      </div>
    </div>
    </tbody>
    </table>
  </div>
</div>

<!-- MODAL  CADASTRAR -->

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

<!-- MODAL EDITAR  -->

<div class="modal fade" id="modalEditarProd" aria-labelledby="modalMotivoLabel" aria-hidden="true">
  <div class="modal-dialog modal-custom">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMotivoLabel">Editar Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Nome do produto</label>
          <input type="text" name="nome_produto" id="nome_produto" value="<?= $preenche['nome_produto'] ?>" class="form-control" placeholder="Marmita P" required>
        </div>

        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea id="descricao" name="descricao" id="descricao" value= "<?= $preenche['descricao']?>" class="form-control" rows="5" placeholder="Digite a descrição..." required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Valor (R$)</label>
          <input type="text" name="valor_prod" id="valor_prod" value="<?= $preenche['valor_prod'] ?>" class="form-control" id='valor' placeholder="19,99" required>
        </div>

        <div class="mb-3">
          <label for="Categoria" class="form-label">Categoria</label>
          <select class="form-select" id="categoria" name="categoria" value="<?= $preenche['categoria'] ?>" required>
            <option value="<?= $preenche['categoria'] ?>"><?= $preenche['categoria'] ?></option>
            <option selected value="Comum">Comum</option>
            <option value="Fitness">Fitness</option>
            <option value="LowCarb">LowCarb</option>
            <option value="Vegetariano">Vegetariano</option>
            <option value="Vegano">Vegano</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Quantidade</label>
          <input type="number" name="qtd_est" id="qtd_est" class="form-control" value="<?= $preenche['qtd_est'] ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Data de Aquisição</label>
          <input type="date" name="dt_aquisicao" id="dt_aquisicao" class="form-control" value="<?= $preenche['dt_aquisicao'] ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Data de Vencimento</label>
          <input type="date" name="dt_venc" id="dt_venc" class="form-control" value="<?= $preenche['dt_aquisicao'] ?>" required>
        </div>

        <input type="hidden" name="id_prod" id="id_prod" value="<?=$id_produto?>">

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

        <button type="button" class="btn btn-primary" id="enviarEditar-btn">Salvar</button>
      </div>

    </div>
  </div>
</div>

<script src="/Marmitaria/js/adm/status.js"></script>
<script src="/Marmitaria/js/adm/modal/cadastroProd.js"></script>
<script src="/Marmitaria/js/adm/acaoProd/excluir.js"></script>
<script src="/Marmitaria/js/adm/modal/editarProd.js"></script>
<?php
include('../../../../padrao/footer.php');
?>