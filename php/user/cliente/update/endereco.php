<?php 
    session_start();
    include("../../../../padrao/conexao.php");

    $id_usuario = $_SESSION['id_user_login'];

    $endereco = $_REQUEST['endereco'];
    $bairro = $_REQUEST['bairro'];
    $cidade = $_REQUEST['cidade'];
    $estado = $_REQUEST['estado'];
    $complemento = $_REQUEST['complemento'];
    $num_casa = $_REQUEST['num_casa'];
    $cep = $_REQUEST['cep'];

    if (!empty($endereco) && !empty($bairro) && !empty($cidade) && !empty($estado) && !empty($num_casa) && !empty($cep)) {
        $sql = "UPDATE endereco SET endereco = '$endereco', bairro='$bairro', cidade = '$cidade', estado = '$estado', num_casa = '$num_casa', cep = '$cep' WHERE id_usuario = '$id_usuario' ";

        $res = $conn -> query($sql);

        if($res == true) {
            echo "<script>alert('Editado com Sucesso')</script>";
            echo "<script>location.href='../perfil/Vperfil.php'</script>";
        } else {
            echo "<script>alert('Não foi possível editar')</script>";
            echo "<script>location.href='../select/perfil.php'</script>";
        }
    }
?>