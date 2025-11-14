$(document).ready(function(){
    $(document).on("click", ".removerBtn", function(){
        const removeBtn = $(this);
        let id_prod_remover = $(this).prev().val();
        
        Swal.fire({
            title: "Tem certeza?",
            text: "Você realmente deseja excluir este produto?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                

                $.ajax({
                    url: "/Marmitaria/php/user/adm/delete/produto.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_prod_remover: id_prod_remover
                    },
                    success: function (res) {
                        console.log(res.status);
                        Swal.fire({
                            title: "Produto Excluido com sucesso",
                            text: "Seu produto foi excluido com sucesso.",
                            icon: "success"
                        });
                        
                        $(removeBtn).closest(".card_produto").remove();

                    },
                    error: function () {
                        console.log("erro");
                    }
                });
            }   
        });
    });
});