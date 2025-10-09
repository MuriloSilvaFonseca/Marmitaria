$(document).ready(function(){

    $('.btnMudaSttCLiente').click(function(){   
        const btnStt = $(this)[0];
        var inputsCliente = $(btnStt).siblings();

        var id_user_status = $(inputsCliente[0]).val();
        var condicao_status = $(inputsCliente[1]).val();

        $.ajax({
            url:"/Marmitaria/php/user/adm/update/status.php",
            method:"post",
            data: {id_user_status: id_user_status, condicao_status: condicao_status},
            dataType: "json",
            success: function(response) {
                console.log(response);
                const colunaStatus = $('#status-cliente-'+id_user_status);
                
                $(colunaStatus).text(response.status_cliente);
                $(inputsCliente[1]).val(response.condicao_status);
                $(btnStt).text(response.btn_status);

                if (response.status == 'sucesso') {
                    Swal.fire({
                        title: "Status Modificado",
                        icon: "success"
                    });
                } else {
                    Swal.fire({
                        title: "Erro",
                        text: "Não foi possível modificar o status",
                        icon: "error"
                    });
                }
            }
        });
    });

    $('.btnDeleteCLiente').click(function(){
        const btnDel = $(this)[0];
        var inputDel = $(btnDel).prev();
        var id_user_excluir = $(inputDel).val();
        const tableDel = $(".tabela-json");

        $.ajax({
            url: "/Marmitaria/php/user/adm/delete/lista-clientes.php",
            method: "post",
            data: {id_user_excluir: id_user_excluir}, 
            dataType: "json",
            success: function(response) {
                console.log(response);

                
            }
        });
    });
});
