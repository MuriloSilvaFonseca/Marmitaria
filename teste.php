<?php 
    include("padrao/header.php");
?>

<div class="container my-4">
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">ID: <strong>1</strong></small>
          <h5 class="card-title mb-1 mt-1">Marmita PP</h5>
          <p class="text-muted mb-2">Categoria: <span class="fw-semibold">LowCarb</span></p>
        </div>
        <div>
          <span class="badge bg-success">Disponível</span>
        </div>
      </div>

      <ul class="list-unstyled mb-3">
        <li><strong>Valor:</strong> R$ 14,99</li>
        <li><strong>Quantidade:</strong> 994</li>
        <li><strong>Data de Aquisição:</strong> 09/09/2025</li>
        <li><strong>Data de Vencimento:</strong> 30/09/2025</li>
      </ul>

      <p class="mb-3">
        <strong>Descrição:</strong><br>
        Marmita pequena balanceada: arroz integral, feijão, peito de frango grelhado e mix de legumes. Nutrição e sabor na medida certa.
      </p>

      <div class="d-flex gap-2">
        <button class="btn btn-success btn-sm">
          <i class="bi bi-pencil-square"></i> Editar
        </button>
        <button class="btn btn-danger btn-sm">
          <i class="bi bi-trash"></i> Excluir
        </button>
      </div>
    </div>
  </div>
</div>

<?php
    include("padrao/footer.php");
?>