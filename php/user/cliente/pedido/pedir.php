<?php 
    include("../../../../padrao/header.php");
    include("../../../../padrao/nav-cliente.php");
    include("../../../../padrao/conexao.php");
    include("../select/carrinho.php")
?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Realizar Pedido</h2>

  <div class="row">
    <div class="col-md-8">
      <div class="row g-3">
        <?php
            if ($row > 0) {
                foreach ($lista as $prod) {
        ?>
          <div class="col-12 col-md-6">
            <div class="card h-100">
              <div class="card-body d-flex flex-column">   
                    <h5 class="card-title"><?= $prod['nome_produto']?></h5>
                    <p class="card-text flex-grow-1"><?= $prod['descricao']?></p>
                    <p class="mb-0 p-2"><?= $prod['categoria']?></p>
                    <p class="card-text"><strong>R$<?= $prod['valor_prod']?></strong></p>

                    <div class="input-group mb-2">
                    <span class="input-group-text">Qtd</span>
                    <input type="number" class="form-control" value="1" min="1">
                    </div>
                    <button type="button" class="btn btn-primary w-100" data-id="<?=$prod['id_produto']?>">Adicionar ao Carrinho</button>                
              </div>
            </div>
          </div>
        <?php
                }
            } else {
                echo "<p class='p-3'>Nenhum produto cadastrado</p>";
            }
        ?>
      </div>
    </div>


    <div class="col-md-4">
        <div class="card" style="position: sticky; top: 20px;">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Resumo do Pedido</h5>
            </div>
        <div class="card-body">
            <form action="carrinho.php" method="post">
                <ul class="list-group mb-3" id="carrinho">
                    <li class="list-group-item text-center text-muted">Nenhum produto adicionado</li>
                </ul>
            <p class="text-end"><strong>Total: R$ <span id="total">0,00</span></strong></p>

            
                <input type="hidden" name="total" id="inputTotal" value="">
                    <button type="submit" class="btn btn-success w-100">Finalizar Pedido</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const botoes = document.querySelectorAll(".btn-primary");
    const carrinho = document.getElementById("carrinho");
    const totalEl = document.getElementById("total");
    let total = 0;

    botoes.forEach(botao => {
        botao.addEventListener("click", function () {
            const card = this.closest(".card-body");
            const nome = card.querySelector(".card-title").textContent;
            const precoText = card.querySelector("strong").textContent.replace("R$", "").trim();
            const preco = parseFloat(precoText.replace(",", "."));
            const qtd = parseInt(card.querySelector("input").value) || 1;

            
            total = total + (preco * qtd);
            totalEl.textContent = total.toFixed(2).replace(".", ",");
            document.getElementById("inputTotal").value = total.toFixed(2);

            
            const vazio = carrinho.querySelector(".text-muted");
            if (vazio) vazio.remove();
            
            const li = document.createElement("li");
            li.classList.add("list-group-item", "d-flex", "justify-content-between", "align-items-center");

            const idProduto = this.getAttribute("data-id");

            li.innerHTML = `
                <input type='hidden' name='id_produto_carrinho[]' value='${idProduto}'>
                <input type='hidden' name='nome_prod_carrinho[]' value='${nome}'>
                <input type='hidden' name='qtd_prod[]' value='${qtd}'>
                <input type='hidden' name='vlr_uni[]' value='${preco}'>

                <span>${nome} x${qtd}</span>
                <span>
                  R$ ${(preco * qtd).toFixed(2).replace(".", ",")}
                  <button class="btn btn-sm btn-danger ms-2">Remover</button>
                </span>
            `;

            carrinho.appendChild(li);

            const btnRemover = li.querySelector("button");
            btnRemover.addEventListener("click", function () {
                total = total - (preco * qtd);
                totalEl.textContent = total.toFixed(2).replace(".", ",");
                li.remove();

                
                if (carrinho.children.length === 0) {
                    const vazioLi = document.createElement("li");
                    vazioLi.classList.add("list-group-item", "text-center", "text-muted");
                    vazioLi.textContent = "Nenhum produto adicionado";
                    carrinho.appendChild(vazioLi);
                }
            });
        });
    });
});

</script>

<?php 
    include("../../../../padrao/footer.php");
?>