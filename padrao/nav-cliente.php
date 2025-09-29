<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow-sm">
  <div class="container-fluid">

    <!-- Logo / Nome -->
    <a class="navbar-brand fw-bold text-light" href="#">Marmitaria</a>

    <!-- Botão mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links centralizados -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav gap-4"> <!-- gap cria espaçamento -->
        <li class="nav-item">
          <a class="nav-link active text-light" href="/Marmitaria/php/home/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/Marmitaria/php/user/cliente/pedido/pedir.php">Pedir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/Marmitaria/php/user/cliente/pedido/confPedido.php">Pedidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/Marmitaria/php/user/cliente/perfil/Vperfil.php">Perfil</a>
        </li>
      </ul>
    </div>

    <!-- Botão sair alinhado à direita -->
    <a href="/Marmitaria/php/user/registro/logout.php" class="btn btn-danger ms-auto">Sair</a>
  </div>
</nav>