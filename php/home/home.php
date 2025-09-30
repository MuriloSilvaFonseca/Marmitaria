<?php
include('../../padrao/header.php');

session_start();
if (!isset($_SESSION["email_login"]) == true  && !isset($_SESSION["senha_login"]) == true) {
    unset($_SESSION["email_login"]);
    unset($_SESSION["senha_login"]);
    echo "<script>location.href='../index.php';</script>";
} else {
}
include("../../padrao/nav-cliente.php");

?>

<<<<<<< HEAD


<!-- Conteúdo -->
<div class="container my-5">
    <!-- Pedir -->
    <div class="row g-4">
=======
<div class="container my-5">
    <div class="row g-4">


>>>>>>> b2cc565e3cf82f61a41678b2ef31a83c29800194
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">🛒 Pedir</h5>
                    <p class="card-text">Faça um novo pedido de forma rápida e prática.</p>
                    <a href="../user/cliente/pedido/pedir.php" class="btn btn-dark">Novo Pedido</a>
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <!-- Pedidos -->
=======
>>>>>>> b2cc565e3cf82f61a41678b2ef31a83c29800194
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">📦 Pedidos</h5>
                    <p class="card-text">Veja o status dos seus pedidos e acompanhe entregas.</p>
                    <a href="../user/cliente/pedido/confPedido.php" class="btn btn-dark">Ver Pedidos</a>
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <!-- Conta -->
=======
>>>>>>> b2cc565e3cf82f61a41678b2ef31a83c29800194
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">👤 Conta</h5>
                    <p class="card-text">Gerencie seus dados pessoais e informações de login.</p>
                    <a href="../user/cliente/perfil/Vperfil.php" class="btn btn-dark">Gerenciar Conta</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../../padrao/footer.php')
?>