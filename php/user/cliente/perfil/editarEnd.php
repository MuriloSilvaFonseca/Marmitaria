<?php 
    session_start();
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav-cliente.php");
    include("../../../../padrao/conexao.php");
    include("../select/perfil.php");
?>
    
    <h1>Editar Endereço</h1>

    <!-- Card de Endereço -->
    <div class="col-md-4 mx-auto">
      <div class="card shadow">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0">Endereço</h5>
        </div>
        <div class="card-body">
            <form action="../update/endereco.php" method="post">

                <div class="mb-3">
                    <label class="form-label">Rua</label>
                    <input type="text" name="endereco" class="form-control" value="<?= $end['endereco']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Bairro</label>
                    <input type="text" name="bairro" class="form-control" value="<?= $end['bairro']?>">
                </div>

            <div class="mb-3">
                <label class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" value="<?= $end['cidade']?>">
                </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" name="estado" id="estado" required>
                        <option value="<?= $end['estado']?>" selected><?= $end['estado']?></option>
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


            <div class="mb-3">
                <label class="form-label">Complemento</label>
                <input type="text" name="complemento" class="form-control" value="<?= $end['endereco']?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Número da Casa</label>
                <input type="text" name="num_casa" class="form-control" value="<?= $end['num_casa']?>">
            </div>

            <div class="mb-3">
                <label class="form-label">CEP</label>
                <input type="text" name="cep" class="form-control" id="cep" value="<?= $end['cep']?>">
            </div>

            <div class="mb-0 p-2 pt-0">
                <button type="submit" class="btn btn-success w-100">Editar Endereço</button>
            </div>

            </form>
        </div>
      
      </div>
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