$(document).ready(function(){
    $('#valor_prod').mask('000.000.000.000.000,00', {reverse: true});

    $(document).on("click", "#cadProd", function(){
        $("#nome_produto").val("");
        $("#descricao").val("");
        $("#valor_prod").val("");
        $("#categoria").val("");
        $("#qtd_est").val("");
        $("#dt_aquisicao").val("");
        $("#dt_venc").val("");

        $("#modalCadastroProd").modal("show");
    });

    $(document).on("click", "#enviarCadastro-btn", function(){
            
        let nome_produto = $("#nome_produto").val();
        let descricao = $("#descricao").val();
        let valor_prod = $("#valor_prod").val();
        let categoria = $("#categoria").val();
        let qtd_est = $("#qtd_est").val();
        let dt_aquisicao = $("#dt_aquisicao").val();
        let dt_venc = $("#dt_venc").val();
        let status = $("#status").val();
        
        
        $.ajax({
            url: "/Marmitaria/php/user/adm/insert/produto.php",
            method: "POST",
            data: {
                nome_produto: nome_produto,
                descricao: descricao,
                valor_prod: valor_prod,
                categoria: categoria,
                qtd_est: qtd_est,
                dt_aquisicao: dt_aquisicao,
                dt_venc: dt_venc,
                status: status
            },
            dataType: "json",
            success: function(response) {
                console.log(response.status);

                $.ajax({
                    url: "/Marmitaria/php/user/adm/select/idProdAjax.php",
                    method: "GET",
                    dataType: "json",
                    success: function(res) {
                        console.log(res.status);

                        let idProd = res.idProd.id_produto;
                        let statusProd = res.statusProd


                        let card_prod = `
                            <div class="col-12 col-md-6 card_produto">
                                <div class="card shadow border-0 h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                            <small class="text-muted">ID: <strong>${idProd}</strong></small>
                                            <h5 class="card-title mb-1 mt-1">${nome_produto}</h5>
                                            <p class="text-muted mb-2">Categoria: <span class="fw-semibold">${categoria}</span></p>
                                            </div>
                                            <span class="badge bg-success" id="status-produto-${idProd}">${statusProd}</span>  
                                        </div>

                                        <ul class="list-unstyled mb-3">
                                            <li><strong>Valor: </strong><span class="mask_valor">${valor_prod}</span></li>
                                            <li><strong>Quantidade: </strong>${qtd_est}</li>
                                            <li><strong>Data de Aquisição: </strong><span class="mask_data">${response.data_aqui_formatada}</span></li>
                                            <li><strong>Data de Vencimento: </strong> <span class="mask_data">${response.data_venc_formatada}</span></li>
                                        </ul>

                                        <p class="mb-3">
                                            <strong>Descrição:</strong><br>
                                            ${descricao}
                                        </p>

                                        <div class="d-flex gap-2">
                                            <form action="editarProd.php" method="post" class="mb-0">
                                            <input type="hidden" name="id_prod_editar" value="${idProd}">
                                            <button type="submit" class="btn btn-sm btn-success">✏️</button>
                                            </form>
                                            <div class="container_remover">
                                                <input type="hidden" name="id_prod_remover" value="${idProd}">
                                                <button class="btn btn-danger btn-sm removerBtn">🗑️</button>
                                            </div>

                                            <button type="submit" class="btn btn-sm btn-warning btnMudaProduto">
                                            ⛔
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        $(".conj_card_prod").append(card_prod);
                        $(".mask_valor").mask('000.000.000.000.000,00', {reverse: true});
                        $('.mask_data').mask('00/00/0000');
                    },
                    error: function() {
                        console.log("erro");
                        
                    }
                });

                Swal.fire({
                    title: "Produto Cadastrado",
                    text: "Seu produto foi cadastrado com sucesso.",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed || result.isDismissed) {
                        $("#modalCadastroProd").modal("hide");
                    }
                });
            },
            error: function() {
                console.log("erro")
            }
        });
    });
});