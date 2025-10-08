$(document).ready(function(){
    function mudaSttCliente() {
    var id_user_status = $("#id_user_status").val();
    var condicao_status = $("#condicao_status").val();

    console.log(id_user_status);
        $.ajax({
            url:"/Marmitaria/php/user/adm/update/status.php",
            method:"post",
            data: {id_user_status: id_user_status, condicao_status: condicao_status},
            dataType: "text",
            success: function(response) {
                $("#alertStts").html(response);
            }
        });
    }

    $("#btnMudaSttCLiente").click(function(){
        mudaSttCliente();
    });
});