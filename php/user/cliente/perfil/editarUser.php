<?php 
    session_start();
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav-cliente.php");
    include("../../../../padrao/conexao.php");
    include("../select/perfil.php");
?>


<div class="col-md-4 mx-auto">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Endereço</h5>
        </div>

        <div class="card-body">
            <form action="../update/user.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome_usuario" class="form-control" value="<?= $user['nome_usuario']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">E-Mail</label>
                    <input type="text" name="email" class="form-control" value="<?= $user['email']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="text" name="senha" class="form-control" value="<?= $user['senha']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" value="<?= $user['telefone']?>" pattern="\(\d{2}\) \d{4,5}-\d{4}" required>
                </div>

                <div class="mb-3">
                    <label for="Data de nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" name="dt_nascimento" class="form-control" value="<?= $user['dt_nascimento']?>" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"  required>
                </div>


                <div class="mb-3">
                    <label class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" value="<?= $user['cpf']?>" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"  required>
                </div>

                <div class="mb-0 p-2 pt-0">
                    <button type="submit" class="btn btn-primary w-100">Editar usuário</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
        $('#cpf').mask('000.000.000-00');
        $('#telefone').mask('(00) 00000-0000');
</script>

<?php 
    include("../../../../padrao/footer.php");
?>