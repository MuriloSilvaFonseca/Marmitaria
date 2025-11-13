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
    <div class="container my-4">
      <div class="row g-4 conj_card_prod">
        <?php
        if ($row > 0) {
        ?>
          <?php
          foreach ($lista as $user) { ?>

          <!-- CARD -->
            <div class="col-12 col-md-6 card_produto">
              <div class="card shadow border-0 h-100">
                <div class="card-body" id="card-<?= $user['id_produto'] ?>">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <small class="text-muted">ID: <strong class="idProd_texto"><?= $user['id_produto'] ?></strong></small>
                      <h5 class="card-title mb-1 mt-1 nome_produto_texto"><?= $user['nome_produto'] ?></h5>
                      <p class="text-muted mb-2">Categoria: <span class="fw-semibold categoria_texto"><?= $user['categoria'] ?></span></p>
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
                    <li><strong>Valor:</strong> <span class="valor_prod_texto"><?= number_format($user['valor_prod'], 2, ',', '.') ?></span></li>
                    <li><strong>Quantidade:</strong> <span class="qtd_est_texto"><?= $user['qtd_est'] ?></span></li>
                    <li><strong>Data de Aquisição:</strong> <span  class="dt_aquisicao_texto"><?= $dataBR = date("d/m/Y", strtotime($user['dt_aquisicao'])) ?></span></li>
                    <li><strong>Data de Vencimento:</strong> <span class="dt_venc_texto"><?= $dataBR = date("d/m/Y", strtotime($user['dt_venc'])) ?></span></li>
                  </ul>

                  <p class="mb-3">
                    <strong>Descrição:</strong><br>
                    <span class="descricao_texto"><?= $user['descricao'] ?></span>
                  </p>

                  <div class="d-flex gap-2">

                    <div class="container_edit">
                      <input type="hidden" name="id_prod_editar" value="<?= $user['id_produto']; ?>">
                      <button type="submit" class="btn btn-sm btn-success editarBtn">✏️</button>
                    </div>            
                    
                    <div class="container_remover">
                      <input type="hidden" name="id_prod_remover" id="id_prod_remover" value="<?= $user['id_produto']; ?>">
                      <button class="btn btn-danger btn-sm removerBtn">🗑️</button>
                    </div>

                    <div class="container_mudaStt">
                      <input type="hidden" name="id_prod_mudaStt" id="id_prod_mudaStt" value="<?= $user['id_produto']; ?>">
                      <input type="hidden" name="condicao_status" id="condicao_status" value="<?= $user['status']; ?>">
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

<div class="modal fade" id="modalEditarProd" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog modal-custom">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Nome do produto</label>
          <input type="text" name="nome_produto" id="nome_produto_edit" class="form-control" placeholder="Marmita P" required>
        </div>

        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea name="descricao" id="descricao_edit" class="form-control" rows="5" placeholder="Digite a descrição..." required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Valor (R$)</label>
          <input type="text" name="valor_prod" id="valor_prod_edit" class="form-control" id='valor' placeholder="19,99" required>
        </div>

        <div class="mb-3">
          <label for="Categoria" class="form-label">Categoria</label>
          <select class="form-select" id="categoria_edit" name="categoria" required>
            <option id="opt_edit" selected></option>
            <option value="Comum">Comum</option>
            <option value="Fitness">Fitness</option>
            <option value="LowCarb">LowCarb</option>
            <option value="Vegetariano">Vegetariano</option>
            <option value="Vegano">Vegano</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Quantidade</label>
          <input type="number" name="qtd_est" id="qtd_est_edit" class="form-control"  required>
        </div>

        <div class="mb-3">
          <label class="form-label">Data de Aquisição</label>
          <input type="date" name="dt_aquisicao" id="dt_aquisicao_edit" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Data de Vencimento</label>
          <input type="date" name="dt_venc" id="dt_venc_edit" class="form-control" required>
        </div>

        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        
        <input type="hidden" name="id_prod" id="id_prod_edit">
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