$(document).ready(function(){
    $(document).on("click", ".removerBtn", function(){
        $.ajax({
            url: "/Marmitaria/php/user/adm/delete/produto.php",
            method: "POST",
            dataType: "json",
            data: {
                id_prod_remover: id_prod_remover
            },
            success: function(res) {
                console.log(res.status);
            },
            error: function(){
                console.log("erro");
            }
        });

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
                let id_prod_remover = $(this).prev().val();
            }
        });
    });
});