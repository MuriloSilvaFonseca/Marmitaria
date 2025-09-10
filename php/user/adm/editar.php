<?php 
    include("../../../padrao/header.php");
    include("../../../padrao/conexao.php");
    include("./update/cliente.php");
?>

<div class="card shadow p-4 position-absolute top-50 start-50 translate-middle" style="width: 30rem;">
    <h3 class="text-center mb-3">Editar</h3>
        <form action="update/cliente.php" method="post">

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
                <input type="tel" name="telefone" class="form-control" value="<?= $preenche['telefone'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="number" name="cpf" class="form-control" value="<?= $preenche['cpf'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="dt_nascimento" class="form-control" value="<?= $preenche['dt_nascimento'] ?>">
            </div>

            <button type="submit" class="btn btn-primary w-100">Editar</button>
        </form>
</div>

<?php 
    include('../../../padrao/footer.php');
?>