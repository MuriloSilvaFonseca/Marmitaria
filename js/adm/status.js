$(document).ready(function(){

    $('.btnMudaSttCLiente').click(function(){   
        const btnStt = $(this)[0];
        let inputsCliente = $(btnStt).siblings();

        let id_user_status = $(inputsCliente[0]).val();
        let condicao_status = $(inputsCliente[1]).val();

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
        let inputDel = $(btnDel).prev();
        let id_user_excluir = $(inputDel).val();
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

    $('.btnMudaProduto').click(function(){
        const btnMuda = $(this)[0];

        let inputsProduto = $(btnMuda).siblings();

        let id_produto = $(inputsProduto[0]).val();
        let condicao_status = $(inputsProduto[1]).val();

        $.ajax({
            url: "/Marmitaria/php/user/adm/update/statusProd.php",
            method: "post",
            data: {id_produto: id_produto, condicao_status: condicao_status},
            dataType: "json",
            success: function(response) {
                console.log(response);

                const colunaStatusProd = $("#status-produto-"+id_produto);
                $(colunaStatusProd).text(response.status_produto);
                $()
                
            }
        });
        
    });
});
