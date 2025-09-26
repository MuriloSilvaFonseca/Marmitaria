<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav.php");
    include("../../../../padrao/conexao.php");
    include(".././update/test-id.php");
?>

<div class="card shadow container-fluid mt-5 d-flex justify-content-center" style="width: 30rem;">
    <h3 class="text-center mb-3">Editar</h3>
        <form action="../update/cliente.php" method="post">

            <input type="hidden" name="acao" value="editar">

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome_usuario" class="form-control" value="<?= $preenche['nome_usuario'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" value="<?= $preenche['email'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="tel" name="telefone" id="telefone" class="form-control" value="<?= $preenche['telefone'] ?>" required pattern="\(\d{2}\) \d{4,5}-\d{4}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $preenche['cpf'] ?>" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="dt_nascimento" class="form-control" value="<?= $preenche['dt_nascimento'] ?>" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"  required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Editar</button>
        </form>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $('#cpf').mask('000.000.000-00');
        $('#telefone').mask('(00) 00000-0000');
    </script>

<?php 
    include('../../../../padrao/footer.php');
?>