<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav.php");
    include("../../../../padrao/conexao.php");
    include("../update/test-id-endereco.php");
?>

<div class="container-fluid mt-5 d-flex justify-content-center ">
  <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 400px;">
    <div class="card-header bg-primary text-white text-center rounded-top-4">
      <h5 class="mb-0">Editar Endereço</h5>
    </div>
    <div class="card-body p-4">

      <form action="../update/endereco.php">
        <div class="mb-1">
          <label class="form-label">Rua/Avenida:</label>
          <input type="text" name="endereco" class="form-control" value="<?= $preenche['endereco']?>">
        </div>

        <div class="mb-1">
          <label class="form-label">Bairro</label>
          <input type="text" name="bairro" class="form-control" value="<?= $preenche['bairro']?>">
        </div>

        <div class="mb-1">
          <label class="form-label">Cidade:</label>
          <input type="text" name="cidade" class="form-control" value="<?= $preenche['cidade']?>">
        </div>

        <div class="mb-1">
          <label class="form-label">Estado:</label>
          <input type="text" name="estado" class="form-control" value="<?= $preenche['estado']?>">
        </div>

        <div class="mb-1">
          <label class="form-label">Complemento:</label>
          <input type="text" name="complemento" class="form-control" value="<?= $preenche['complemento']?>">
        </div>

        <div class="mb-1">
          <label class="form-label">Número:</label>
          <input type="text" name="num_casa" class="form-control" value="<?= $preenche['num_casa']?>">
        </div>

        <div class="mb-1">
          <label class="form-label">CEP:</label>
          <input type="text" name="cep" class="form-control" value="<?= $preenche['cep']?>">
        </div>

        
        <div class="card-footer bg-light text-muted text-center rounded-bottom-4">

        <input type="hidden" name="id_user" value="<?=$id_usuario?>">

          <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </div>

      </form>
    </div>
  </div>
</div>



<?php 
    include("../../../../padrao/footer.php");
?>