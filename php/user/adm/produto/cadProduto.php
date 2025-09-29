<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav.php");
?>

    <div class="card shadow p-4 mx-auto mt-3" style="width: 30rem;">

        <form action="../insert/produto.php" method="post">

            <div class="mb-3">
                <label class="form-label">Nome do produto</label>
                <input type="text" name="nome_produto" class="form-control" placeholder="Marmita P" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="5" placeholder="Digite a descrição..." required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Valor (R$)</label>
                <input type="text" name="valor_prod"  class="form-control" id='valor' placeholder="19,99" required>
            </div>

            <div class="mb-3">
                <label for="Categoria" class="form-label">Categoria</label>
                <select class="form-select" name="categoria" required>
                    <option selected value="Comum">Comum</option>
                    <option value="Fitness">Fitness</option>
                    <option value="LowCarb">LowCarb</option>
                    <option value="Vegetariano">Vegetariano</option>
                    <option value="Vegano">Vegano</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantidade</label>
                <input type="number" name="qtd_est" class="form-control" placeholder="5" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Aquisição</label>
                <input type="date" name="dt_aquisicao" class="form-control" placeholder="12/06/2025" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Vencimento</label>
                <input type="date" name="dt_venc" class="form-control" placeholder="23/07/2025">
            </div>

            <input type="hidden" name="status" value="Disponível">

            <button type="submit" class="btn btn-primary w-100">Adicionar</button>
        </form>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
    $('#valor').mask('R$ 0000,00', {reverse: true});
</script>

<?php 
    include('../../../../padrao/footer.php');
?>