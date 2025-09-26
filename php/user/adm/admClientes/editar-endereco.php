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
          <select name="estado" id="estado" class="form-select">
            <option value="<?= $preenche['estado']?>" selected><?= $preenche['estado']?></option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
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
          <input type="text" name="cep" id="cep" class="form-control" value="<?= $preenche['cep']?>">
        </div>

        
        <div class="card-footer bg-light text-muted text-center rounded-bottom-4">

        <input type="hidden" name="id_user" value="<?=$id_usuario?>">

          <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </div>

      </form>
    </div>
  </div>
</div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <script>
    $('#cep').mask('00000-000');
  </script>


<?php 
    include("../../../../padrao/footer.php");
?>