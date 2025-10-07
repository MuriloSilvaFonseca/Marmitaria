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

      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Informações Pessoais</h5>
          </div>
          <div class="card-body">
                      <p><strong>Nome:</strong> <?=$user['nome_usuario']?></p>
                      <p><strong>E-mail:</strong> <?=$user['email']?></p>
                      <p><strong>Senha:</strong> <?=$user['senha']?></p>
                      <p><strong>Telefone:</strong> <?=$user['telefone']?></p>
                      <p><strong>Data de Nascimento:</strong> <?=$user['dt_nascimento']?></p>
                      <p><strong>CPF:</strong> <?=$user['cpf']?></p>
          </div>

          <div class="mb-0 p-2 pt-0">
            <button class="btn btn-primary w-100" onclick="location.href='editarUser.php'">Editar Endereço</button>
          </div>

        </div>
      </div>

      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-success text-white">
            <h5 class="mb-0">Endereço</h5>
          </div>

          <div class="card-body">
            <p><strong>Rua:</strong> <?=$end['endereco']?></p>
            <p><strong>Bairro:</strong> <?=$end['bairro']?></p>
            <p><strong>Cidade:</strong> <?=$end['cidade']?></p>
            <p><strong>Estado:</strong> <?=$end['estado']?></p>
            <p><strong>Complemento:</strong> <?=$end['complemento']?></p>
            <p><strong>Número da Casa:</strong> <?=$end['num_casa']?></p>
            <p><strong>CEP:</strong> <?=$end['cep']?></p>
          </div>

          <div class="mb-0 p-2 pt-0">
            <button class="btn btn-success w-100" onclick="location.href='editarEnd.php'">Editar Endereço</button>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php 
  include("../../../../padrao/footer.php");
?>