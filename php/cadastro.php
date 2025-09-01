<?php 
    include("..\padrao\header.php");
?>


<div class="card shadow p-4 position-absolute top-50 start-50 translate-middle" style="width: 30rem;">
    <h3 class="text-center mb-3">Cadastro</h3>
        <form action="php/acoes.php" method="post">
            <input type="hidden" name="acao" value="cadastrar">

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
                <input type="tel" name="telefone" class="form-control" placeholder="Digite seu telefone" required>
            </div>


            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="number" name="cpf" class="form-control" placeholder="Digite seu CPF" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="dt_nascimento" class="form-control" placeholder="01/02/1999">
            </div>

            <input type="hidden" name="status" value="Ativo">

            <button type="submit" class="btn btn-primary w-100">Criar</button>
        </form>
</div>

<?php 
    include('..\padrao\footer.php');

?>