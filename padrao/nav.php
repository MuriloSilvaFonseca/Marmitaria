



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Navbar</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="../home/home-adm.php">Home</a>
        <a class="nav-link" href="../user/adm/admClientes/listagem-clientes.php">Listagem</a>
        <a class="nav-link" href="">Produto</a>
        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
      </div>

      <a href="../user/registro/logout.php" class="btn btn-danger ms-auto" onclick="<?php echo $_SESSION["email_login"]; ?>">Sair</a>
    </div>
  </div>

  <div>
    <button class="btn btn-secondary" onclick="history.back()">⬅ Voltar</button>
  </div>
</nav>
