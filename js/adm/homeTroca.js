$(document).ready(function() {

    $(document).on("click", ".confPedido-btn", (function(){
        const btnConfPedido = $(this);
        var id_pedido = btnConfPedido.prev().val();
        let sttMod = btnConfPedido.siblings("#sttMod").val();
        let saida = btnConfPedido.siblings("#saida").val();
        let conj_card_naoConf = $(".conj-card-naoConf");
        

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

                if ($(".naoExisteAnd")) {
                    $(".naoExisteAnd").remove();
                }

                var tamanhoConf = conj_card_naoConf.children().length;

                var card_mod = $("#card-naoConf-" + response.id_pedido_resp);
                var conj_card_emAndamento = $(".conj-card-emAndamento");
                conj_card_emAndamento.append(card_mod);

                $(card_mod).addClass("card_andamento");

                var corCardMod = $(card_mod).children().first();
                corCardMod.removeClass("bg-secondary").addClass("bg-warning");
                
                var textoStts = corCardMod.children().last().children().first().children();
                textoStts.removeClass("bg-light text-dark").addClass("bg-warning").text("Em andamento");

                var data_inicio = textoStts.parent().next();
                data_inicio.text("Iniciado em: "+ response.data_inicio);
                
                
                
                btnConfPedido.siblings("#saida").remove();
                let botaoNegar = btnConfPedido.siblings(".negar-btn");
                botaoNegar.remove();

                btnConfPedido.parent().prev().remove()
                let teste = $(btnConfPedido).prev().prev().val("Finalizado");
                console.log(teste);

                btnConfPedido.removeClass("confPedido-btn").addClass("finPedido-btn");
                btnConfPedido.text("Finalizar Pedido");

                if(tamanhoConf == 2) {
                    conj_card_naoConf.append("<div class='alert alert-info'>Não existe pedidos aguardando confirmação</div>");
                }

                Swal.fire({
                    title: "Pedido Confirmado!",
                    text: "Seu pedido está em andamento.",
                    icon: "success"
                });
            },
            error: function(response) {
                console.log("Erro Andamento");
                
            }
        });

        })
    );

    $(document).on("click", ".finPedido-btn",function(){
        const btnFinPedido = $(this);
        let sttMod = $(btnFinPedido.siblings()[0]).val();
        let id_pedido = $(btnFinPedido.siblings()[1]).val();

        console.log(id_pedido);
        
        $.ajax({
            url: "/Marmitaria/php/user/adm/update/statusPed.php",
            method: "post",
            data: {
                sttMod: sttMod, 
                id_pedido: id_pedido
            },
            dataType: "json",
            success: function(response) {
                

                if (response.status == 'sucesso') {
                    Swal.fire({
                        title: "Pedido Finalizado",
                        text: "Você será encaminhado para o histórico.",
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            location.href = "/Marmitaria/php/user/adm/pedidos/pedidos.php";
                        }
                    });

                } else {
                    Swal.fire({
                        title: "Algo deu errado",
                        text: "Erro na resposta do banco. Tente Novamente",
                        icon: "error"
                    });
                }
            },
            error: function(response) {
                console.log("erro");
            }            
        });
    });

    $(document).on("click", ".negarPed-btn", function(){
        const btnNeg = $(this);
        let id_pedido = $(btnNeg).prev()
        
        
    });
});