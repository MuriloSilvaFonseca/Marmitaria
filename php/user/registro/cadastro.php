<?php 
    include("../../../padrao/header.php");
    
?>

<div class="card shadow p-4 position-absolute top-50 start-50 translate-middle" style="width: 30rem;">
    <h3 class="text-center mb-3">Cadastro</h3>
        <form action="../../acoes.php" method="post">

            <input type="hidden" name="acao" value="cadastrar">
            <input type="hidden" name="entrada" value="usuario">

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome_usuario" class="form-control" placeholder="Digite seu nome">
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Digite sua Senha" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="tel" id="telefone" name="telefone" class="form-control" placeholder="Digite seu telefone" pattern="\(\d{2}\) \d{4,5}-\d{4}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite seu CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"  required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="dt_nascimento" class="form-control" placeholder="01/02/1999">
            </div>

            <input type="hidden" name="status" value="Ativo">
            <input type="hidden" name="tipo_usuario" value="Cliente">

            <button type="submit" class="btn btn-primary w-100">Criar</button>
        </form>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $('#cpf').mask('000.000.000-00');
        $('#telefone').mask('(00) 00000-0000');
    </script>
<?php 
    include('../../../padrao/footer.php');
?>