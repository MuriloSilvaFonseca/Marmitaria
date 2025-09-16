<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Navbar</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="/Marmitaria/php/home/home.php">Home</a>
        <a class="nav-link" href="/Marmitaria/php/user/cliente/pedido/pedir.php">Pedir</a>
        <a class="nav-link" href="#">Historico de Pedidos</a>
        <a class="nav-link" href="/Marmitaria/php/user/cliente/perfil/Vperfil.php">Perfil</a>
      </div>

      <a href="/Marmitaria/php/user/registro/logout.php" class="btn btn-danger ms-auto" onclick="<?php echo $_SESSION["email_login"]; ?>">Sair</a>
    </div>
  </div>

</nav>
