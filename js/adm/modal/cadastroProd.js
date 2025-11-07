$(document).ready(function(){
    $(document).on("click", "#cadProd", function(){
        $("#nome_produto").val("");
        $("#descricao").val("");
        $("#valor_prod").val("");
        $("#categoria").val("");
        $("#qtd_est").val("");
        $("#dt_aquisicao").val("");
        $("#dt_venc").val("");

        $("#modalCadastroProd").modal("show");

       
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

});