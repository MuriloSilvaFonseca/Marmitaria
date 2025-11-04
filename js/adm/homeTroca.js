$(document).ready(function() {

    $(".confPedido-btn").click(function(){
        const btnConfPedido = $(this);
        let id_pedido = btnConfPedido.prev().val();
        let sttMod = btnConfPedido.siblings("#sttMod").val();
        let saida = btnConfPedido.siblings("#saida").val();

        $.ajax({
            url: "/Marmitaria/php/user/adm/update/statusPed.php", 
            method: "POST",
            data: {
                sttMod: sttMod,
                id_pedido: id_pedido,
                saida: saida
            },
            dataType: "json",
            success: function(response) {
                console.log(response);


                var card_mod = $("#card-naoConf-" + response.id_pedido_resp);
                var conj_card_emAndamento = $(".conj-card-emAndamento");
                conj_card_emAndamento.append(card_mod);

                var corCardMod = $(card_mod).children().first();
                corCardMod.removeClass("bg-secondary").addClass("bg-warning");
                
                var textoStts = corCardMod.children().last().children().first().children();
                textoStts.removeClass("bg-light text-dark").addClass("bg-warning").text("Em andamento");

                var data_inicio = textoStts.parent().next();
                data_inicio.text("Iniciado em: "+ response.data_inicio);
                
                sttMod = "Finalizado";
                btnConfPedido.siblings("#saida").remove();
                let botaoNegar = btnConfPedido.siblings(".negar-btn");
                botaoNegar.remove();

                btnConfPedido.removeClass(".confPedido-btn").addClass("finPedido-btn");
                btnConfPedido.text("Finalizar Pedido");
            },
            error: function(response) {

            }
        });
    });

    $(".finPedido-btn").click(function(){
        const btnFinPedido = $(this)[0];
        let sttMod = btnFinPedido.siblings("#sttMod");
        let id_pedido = btnFinPedido.siblings("#id_pedido");

        $.ajax({
            // AQUI
            url: ,
            method: "post",
            data: {

            },
            dataType: "json",
            success: function(response) {

            },
            error: function(response) {

            }
        });
    });
});