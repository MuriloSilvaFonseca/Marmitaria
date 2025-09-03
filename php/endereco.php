<?php 
    include("../padrao/header.php");
?>

<div class="card shadow p-4 position-absolute top-50 start-50 translate-middle mt-5 " style="width: 30rem;">
    <h3 class="text-center mb-3">Endereço</h3>
        <form action="acoes.php" method="post">
            
            <input type="hidden" name="acao" value="endereco">

            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" name="nome_usuario" class="form-control" placeholder="Rua São João">
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
                <input type="number" name="numero" class="form-control" placeholder="116" required>
            </div>

            <div class="mb-3">
                <label for="cidade" class="form-label">Escolha uma cidade</label>
                    <select class="form-select" id="cidade" name="cidade">
                        <option selected>Selecione...</option>
                        <option value="sp">São Paulo</option>
                        <option value="rj">Rio de Janeiro</option>
                        <option value="bh">Belo Horizonte</option>
                    </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Complemento</label>
                <input type="text" name="complemento" class="form-control" placeholder="Casa">
            </div>

            <button type="submit" class="btn btn-primary w-100">Criar</button>
        </form>
</div>

<?php 
    include("../padrao/footer.php");
?>