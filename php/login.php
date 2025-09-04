


<div class="d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 22rem;">
        <h3 class="text-center mb-3">Login</h3>
        <form action="php/acoes.php" method="post">
            <input type="hidden" name="acao" value="login">

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email_login" class="form-control" placeholder="Digite seu e-mail" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="senha_login" class="form-control" placeholder="Digite sua senha" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>

            <p class="mt-2 text-center">Não tem uma conta? <a href="php/cadastro.php">Registre-se</a></p>
        </form>
    </div>
    
</div>
