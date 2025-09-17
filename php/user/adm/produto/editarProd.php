<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav.php");
    include("../../../../padrao/conexao.php");
    include(".././update/test-idProd.php");
?>

    <h1>
        Cadastrar produto
    </h1>

    <div class="card shadow p-4 mx-auto mt-3" style="width: 30rem;">
    <h3 class="text-center mb-3">Editar Produto</h3>
        <form action="../update/produto.php" method="post">

            <div class="mb-3">
                <label class="form-label">Nome do produto</label>
                <input type="text" name="nome_produto" class="form-control" value="<?= $preenche['nome_produto'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="5" placeholder="Digite a descrição..." required><?= $preenche['descricao']?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Valor (R$)</label>
                <input type="number" name="valor_prod" class="form-control" value="<?= $preenche['valor_prod'] ?>"  required step="0.01">
            </div>

            <div class="mb-3">
                <label for="Categoria" class="form-label">Categoria</label>
                <select class="form-select" name="categoria" value="<?= $preenche['categoria'] ?>" required>
                    <option value="<?= $preenche['categoria'] ?>"><?= $preenche['categoria'] ?></option>
                    <option value="Comum">Comum</option>
                    <option value="Fitness">Fitness</option>
                    <option value="LowCarb">LowCarb</option>
                    <option value="Vegetariano">Vegetariano</option>
                    <option value="Vegano">Vegano</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantidade</label>
                <input type="number" name="qtd_est" class="form-control" value="<?= $preenche['qtd_est'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Aquisição</label>
                <input type="date" name="dt_aquisicao" class="form-control" value="<?= $preenche['dt_aquisicao'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Vencimento</label>
                <input type="date" name="dt_venc" class="form-control" value="<?= $preenche['dt_venc'] ?>">
            </div>

            <input type="hidden" name="id_prod" value="<?=$id_produto?>">

            <button type="submit" class="btn btn-primary w-100">Salvar</button>
        </form>
</div>

<?php 
    include('../../../../padrao/footer.php');
?>