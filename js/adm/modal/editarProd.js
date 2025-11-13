$(document).ready(function() {
    $('#valor_prod_edit').mask('000.000.000.000.000,00', {reverse: true});

    $(document).on("click", ".editarBtn", function(){
        const btnEdit = $(this);
        var id_prod_editar = $(btnEdit).prev().val();    
        $("#modalEditarProd").modal("show");
        
        $.ajax({
            url: "/Marmitaria/php/user/adm/update/test-idProd.php",
            method: "post",
            dataType: "json",
            data: {
                id_prod_editar: id_prod_editar
            },
            success: function(res) {
                console.log(res.status);
                $("#id_prod_edit").val(res.id_prod);
                let descricao_edit = $("#descricao_edit").val(res.descricao);
                let valor_prod_edit = $("#valor_prod_edit").val(res.valor_prod);

                let categoria_edit = $("#categoria_edit").val(res.categoria);
                $("#opt_edit").val(res.categoria);
                $("#opt_edit").text(res.categoria);

                let qtd_est_edit = $("#qtd_est_edit").val(res.qtd_est);
                let dt_aquisicao_edit = $("#dt_aquisicao_edit").val(res.dt_aquisicao);
                let dt_venc_edit = $("#dt_venc_edit").val(res.dt_venc);
                let nome_produto_edit = $("#nome_produto_edit").val(res.nome_produto);

                $(".mask_valor").mask('000.000.000.000.000,00', {reverse: true});
                $('.mask_data').mask('00/00/0000');
            },
            error: function() {
                console.log("Erro na requisição ajax");
            }
        });
    });


    $("#modalEditarProd").on("click", "#enviarEditar-btn", function(){
        let id_prod_editar = $(this).prev().val();
        
        Swal.fire({
            title: "Deseja confirmar?",
            text: "Você realmente deseja editar este produto?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgba(88, 165, 0, 1)",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Editar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {

                let descricao_edit = $("#descricao_edit").val();
                let valor_prod_edit = $("#valor_prod_edit").val();
                let categoria_edit = $("#categoria_edit").val();
                let qtd_est_edit = $("#qtd_est_edit").val();
                let dt_aquisicao_edit = $("#dt_aquisicao_edit").val();
                let dt_venc_edit = $("#dt_venc_edit").val();
                let nome_produto_edit = $("#nome_produto_edit").val();

                $.ajax({
                    url: "/Marmitaria/php/user/adm/update/produto.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_prod_editar: id_prod_editar,
                        nome_produto_edit: nome_produto_edit,
                        descricao_edit: descricao_edit,
                        valor_prod_edit: valor_prod_edit,
                        categoria_edit: categoria_edit,
                        dt_aquisicao_edit: dt_aquisicao_edit,
                        dt_venc_edit: dt_venc_edit,
                        qtd_est_edit: qtd_est_edit
                    },
                    success: function (res) {
                        console.log(res.status);

                        let teste = $("#card-"+id_prod_editar).find(".nome_produto_texto").text(nome_produto_edit);
                        $("#card-"+id_prod_editar).find("categoria_texto").text(categoria_edit);
                        $("#card-"+id_prod_editar).find("categoria_texto").text(res.valor);
                        $("#card-"+id_prod_editar).find(".qtd_est_texto").text(qtd_est_edit);
                        $("#card-"+id_prod_editar).find(".dt_aquisicao_texto").text(res.data_aqui_format);
                        $("#card-"+id_prod_editar).find(".dt_venc_texto").text(res.data_venc_format);
                        $("#card-"+id_prod_editar).find(".descricao_texto").text(descricao_edit);

                        console.log(teste);
                        
                        
                        $("#modalEditarProd").modal("hide");

                        Swal.fire({
                            title: "Produto Editado",
                            text: "Seu produto foi editado com sucesso.",
                            icon: "success"
                        })
                    },
                    error: function () {
                        console.log("Erro na requisição de edição do Ajax");
                    }
                });
            } 
        });
    });
});