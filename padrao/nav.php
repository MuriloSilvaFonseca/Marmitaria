<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">

    <a class="navbar-brand fw-bold text-uppercase" href="#">Marmitaria</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

      <div class="navbar-nav mx-auto gap-4">
        <a class="nav-link active" aria-current="page" href="/Marmitaria/php/home/home-adm.php">🏠 Home</a>
        <a class="nav-link" href="/Marmitaria/php/user/adm/admClientes/listagem-clientes.php">👥 Clientes</a>
        <a class="nav-link" href="/Marmitaria/php/user/adm/produto/listProd.php">📦 Produtos</a>
        <a class="nav-link" href="/Marmitaria/php/user/adm/pedidos/pedidos.php">📝 Pedidos</a>
      </div>

      <a href="/Marmitaria/php/user/registro/logout.php" class="btn btn-danger px-4"
         onclick="<?php echo $_SESSION['email_login']; ?>">Sair</a>
    </div>
  </div>
</nav>
