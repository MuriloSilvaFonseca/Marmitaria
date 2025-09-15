<?php 
    include("../../../padrao/header.php");
    
    session_start();
    

    if(!isset($_SESSION["email"]) == true) {
        unset($_SESSION["email"]);
        echo "<script>location.href='cadastro.php'</script>";
    } else {

    }
?>


<div class="card shadow p-4 position-absolute top-50 start-50 translate-middle mt-5" style="width: 30rem;">
    <h3 class="text-center mb-3">Endereço</h3>
        <form action="../../acoes.php" method="post">
            
            <input type="hidden" name="acao" value="cadastrar">
            <input type="hidden" name="entrada" value="endereco">



            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" placeholder="Rua São João" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Bairro</label>
                <input type="text" name="bairro" class="form-control" placeholder="Jardim das Rosas" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" placeholder="SJBV" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Número</label>
                <input type="number" name="num_casa" class="form-control" placeholder="116" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" name="estado" id="estado" required>
                        <option value="" selected>Selecione...</option>
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
                <input type="text" name="complemento" class="form-control" placeholder="Casa">
            </div>

            <div class="mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" placeholder="00000-000" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Criar</button>
        </form>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $('#cep').mask('00000-000');
    </script>
<?php 
    include("../../../padrao/footer.php");
?>