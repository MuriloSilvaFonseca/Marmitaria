<?php 
    session_start();
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav-cliente.php");
    include("../../../../padrao/conexao.php");
    include("../select/perfil.php");
?>
    
    <h1>Perfil</h1>

    <div class="container py-5">
    <div class="row g-4">

    <!-- Card de Informações Pessoais -->
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Informações Pessoais</h5>
        </div>
        <div class="card-body">
            <?php 
                foreach ($lista as $user) {
                    ?>
                    <p><strong>Nome:</strong> <?=$user['nome_usuario']?></p>
                    <p><strong>Sobrenome:</strong> <?=$user['nome_usuario']?></p>
                    <p><strong>E-mail:</strong> <?=$user['nome_usuario']?></p>
                    <p><strong>Senha:</strong> <?=$user['nome_usuario']?></p>
                    <p><strong>Data de Nascimento:</strong> <?=$user['nome_usuario']?></p>
                    <p><strong>CPF:</strong> <?=$user['nome_usuario']?></p>
            <?php 
                }
            ?>

        </div>

        <form action="" method="post" class="mb-0 p-2 pt-0">
            <button type="submit" class="btn btn-primary w-100">Editar Perfil</button>
        </form>

      </div>
    </div>

    <!-- Card de Endereço -->
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0">Endereço</h5>
        </div>
        <div class="card-body">
          <p><strong>Rua:</strong> Rua das Flores</p>
          <p><strong>Bairro:</strong> Jardim Primavera</p>
          <p><strong>Cidade:</strong> São Paulo</p>
          <p><strong>Estado:</strong> SP</p>
          <p><strong>Complemento:</strong> Apartamento 101</p>
          <p><strong>Número da Casa:</strong> 123</p>
        </div>

        <form action="" method="post" class="mb-0 p-2 pt-0">
            <button type="submit" class="btn btn-success w-100">Editar Endereço</button>
        </form>

      </div>
    </div>

   

  </div>
</div>



<?php 
    include("../../../../padrao/footer.php");
?>