<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav.php");
    include("../../../../padrao/conexao.php");
    include("../select/endereco.php");
?>

<div class="container-fluid mt-5 d-flex justify-content-center ">
  <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 400px;">
    <div class="card-header bg-primary text-white text-center rounded-top-4">
      <h5 class="mb-0">Endereço</h5>
    </div>
    <div class="card-body p-4">
      <p><strong>Rua/Avenida:</strong> <?= $linha['endereco']  ?> </p>
      <p><strong>Bairro:</strong> <?= $linha['bairro']  ?> </p>
      <p><strong>Cidade:</strong> <?= $linha['cidade']  ?> </p>
      <p><strong>Estado:</strong> <?= $linha['estado']  ?> </p>
      <p><strong>Complemento:</strong> <?= $linha['complemento']  ?> </p>
      <p><strong>Número:</strong> <?= $linha['num_casa']  ?> </p>
      <p><strong>CEP:</strong> <?= $linha['cep']  ?> </p>
    </div>
    <div class="card-footer bg-light text-muted text-center rounded-bottom-4">
      <form action="editar-endereco.php">
        <input type="hidden" name="id_usuario" value="<?= $id_user;?>">
        <button type="submit" class="btn btn-primary w-100">Editar</button>
      </form>
    </div>
  </div>
</div>



<?php 
    include("../../../../padrao/footer.php");
?>
