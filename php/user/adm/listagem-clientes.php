<?php 
  include("../../../padrao/header.php");
  include("../../../padrao/nav.php");
  include("../../../padrao/conexao.php");
  include("select/cliente.php");
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
                  <form action="editar.php" method="post">
                    <input type="hidden" name="acao" value="test-id">
                    <input type="hidden" name="id_user_editar" value="<?= $envia = $user['id_usuario'];?>">
                    <button type="submit" class="btn btn-sm btn-success">Editar</button>
                  </form>
                  <a class="btn btn-sm btn-danger" href="">Excluir</a> <br>
                  <a class="btn btn-sm btn-primary mt-1" href="">Lista de Pedidos</a>
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
  include("../../../padrao/footer.php");
?>
