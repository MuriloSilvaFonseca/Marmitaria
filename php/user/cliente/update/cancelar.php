<?php 
        include("../../../../padrao/header.php");
        include("../../../../padrao/conexao.php");
        $id_pedido = $_REQUEST['id_pedido'];
?>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
      Motivo do Cancelamento
    </div>
    <div class="card-body">
      <form action="motivo.php" method="POST">
        <div class="mb-3">
          <label for="motivo" class="form-label">Explique o motivo</label>
          <textarea class="form-control" name="motivo" rows="3" placeholder="Digite o motivo do cancelamento..." required></textarea>
        </div>
        <div class="d-flex justify-content-end">
            <input type="hidden" name="id_pedido" value="<?=$id_pedido?>">
            <button type="submit" class="btn btn-danger">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php 
        include("../../../../padrao/footer.php");
?>