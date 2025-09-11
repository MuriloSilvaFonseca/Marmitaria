<?php 
  include("../../../../padrao/header.php");
  include("../../../../padrao/nav.php");
  include("../../../../padrao/conexao.php");
  include("../select/cliente.php");
?>

  <div class="container py-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">📋 Listagem de Clientes</h4>
        <button class="btn btn-light btn-sm"></button>
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
                <th>Email/Telefone</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Status</th>
                <th>Endereco</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($lista as $user) { ?>
              <tr>
                <td><?= $user['id_usuario'] ?></td>
                <td><?= $user['nome_usuario'] ?></td>
                <td><?= $user['email'] ?> <br> <?= $user['telefone'] ?></td>
                <td><?= $user['cpf'] ?></td>
                <td><?= $user['dt_nascimento'] ?></td>
                <td><?= $user['status'] ?></td>
                <td>
                  <form action="listEndereco.php" method="post" class="alinhamento">
                    <input type="hidden" name="id_user" value="<?= $envia = $user['id_usuario'];?>">
                    <button type="submit" class="btn btn-sm btn-primary">Mostrar</button>
                  </form>
                </td>
                <td>
                  <div class="d-flex flex-wrap gap-1">

                    <form action="editar-cliente.php" method="post">
                      <input type="hidden" name="id_user_editar" value="<?= $user['id_usuario']; ?>">
                      <button type="submit" class="btn btn-sm btn-success">Editar</button>
                    </form>

                    <form action="../delete/lista-clientes.php" method="post">
                      <input type="hidden" name="id_user_excluir" value="<?= $user['id_usuario']; ?>">
                      <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>

                    <form action="../update/status.php" method="post">
                      <input type="hidden" name="id_user_status" value="<?= $user['id_usuario']; ?>">
                      <input type="hidden" name="condicao_status" value="<?= $user['status']; ?>">
                      <button type="submit" class="btn btn-sm btn-warning">
                        <?php 
                          if ($user['status'] == 'Ativo') {
                            echo 'Desativar';
                          } else {
                            echo 'Ativar';
                          }
                        ?>
                      </button>
                    </form>

                    <a class="btn btn-sm btn-info" href="">Lista de Pedidos</a>
                  </div>

                </td>
              </tr>
              <?php 
              }} else {
                  echo "<p>Não tem clientes cadastrados</p>";
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
  include("../../../../padrao/footer.php");
?>
