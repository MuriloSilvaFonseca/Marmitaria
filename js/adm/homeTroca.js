$(document).ready(function() {
    $(".confPedido-btn").click(function(){
        const btnConfPedido = $(this);
        var id_user = btnConfPedido.prev().val();
        var sttMod = btnConfPedido.siblings("#sttMod").val();
        var saida = btnConfPedido.siblings("#saida").val();

        $.ajax({
            url: "/Marmitaria/php/user/adm/update/statusPed.php", 
            method: "POST",
            data: {sttMod: sttMod, id_pedido: id_pedido, saida: saida},
            dataType: "json",
            success: function(response) {
                
            },
            error: function(response) {

            }
        });
    });
});