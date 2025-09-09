<?php 
  include("../../../padrao/header.php");
  include("../../../padrao/nav.php");
  include("../../../padrao/conexao.php");

    $sql = "SELECT id_usuario, nome_usuario, email, telefone, cpf, dt_nascimento, tipo_usuario, status FROM usuario";
    $res = $conn -> query($sql);

    $lista = $res -> fetchAll(PDO::FETCH_ASSOC);
?>

  <div class="container py-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">📋 Listagem de Clientes</h4>
        <button class="btn btn-light btn-sm"></button>
      </div>
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
                  <form action="acoes-listar.php" method="post">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="id_user" value="<?php $user['id_usuario']?>">
                    <button type="submit" class="btn btn-sm btn-primary">Mostrar</button>
                  </form>
                </td>
                <td>
                  <a class="btn btn-sm btn-success" href="../editar.php">Editar</a>
                  <a class="btn btn-sm btn-danger" href="">Excluir</a> <br>
                  <a class="btn btn-sm btn-primary mt-1" href="../editar.php">Lista de Pedidos</a>
                </td>
              </tr>
              <?php }?>
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